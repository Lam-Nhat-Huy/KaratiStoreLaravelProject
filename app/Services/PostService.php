<?php

namespace App\Services;

use App\Services\Interfaces\PostServiceInterface;
use App\Services\Interfaces\BaseServiceInterface;
use App\Repositories\Interfaces\PostRepositoryInterface as PostRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Classes\Nestedsetbie;


/**
 * Class PosteService
 * @package App\Services
 */
class PostService extends BaseService implements PostServiceInterface
{
    protected $postRepository;
    protected $language;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->language = $this->currentLanguage();
    }

    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $condition['where'] = [
            ['tb2.language_id', '=', $this->language]
        ];
        $perPage = 10;
        $post =  $this->postRepository->pagination(
            $this->paginateSelect(),
            $condition,
            $perPage,
            ['posts.id', 'DESC'],
            ['path' => ''],
            [['post_language as tb2', 'tb2.post_id', '=', 'posts.id']],
            [],
        );
        return $post;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->only($this->payload());
            $payload['user_id'] = Auth::id();
            $payload['album'] = json_encode($payload['album']);
            $post = $this->postRepository->create($payload);

            if ($post->id > 0) {
                $payloadLanguage = $request->only($this->payloadLanguage());
                $payloadLanguage['language_id'] = $this->currentLanguage();
                $payloadLanguage['post_id'] = $post->id;
                $payloadLanguage['canonical'] = Str::slug($payloadLanguage['canonical']);
                $catalogue = $this->catalogue($request);
                $post->post_catalogues()->sync($catalogue);
            }



            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
            return false;
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->findById($id);
            $payload = $request->only($this->payload());
            $payload['album'] = json_encode($payload['album']);
            $flag = $this->postRepository->update($payload, $id);

            if ($flag === TRUE) {
                $payloadLanguage = $request->only($this->payloadLanguage());
                $payloadLanguage['language_id'] = $this->currentLanguage();
                $payloadLanguage['post_catalogue_id'] = $id;
                $post->languages()->detach([
                    $payloadLanguage['language_id'],
                    $id
                ]);
                $reponse = $this->postRepository->createPivot($post, $payloadLanguage);
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
            return false;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->postRepository->delete($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
            return false;
        }
    }

    public function updateStatus($post = [])
    {
        DB::beginTransaction();
        try {
            $payload[$post['field']] = (($post['value'] == 1) ? 2 : 1);
            $this->postRepository->update($payload, $post['modelId']);
            $this->changeUserStatus($post, $payload[$post['field']]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
            return false;
        }
    }

    public function updateStatusAll($post)
    {
        DB::beginTransaction();
        try {
            $payload[$post['field']] = $post['value'];
            $this->postRepository->updateByWhereIn('id', $post['id'], $payload);
            $this->changeUserStatus($post, $payload[$post['field']]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
            return false;
        }
    }

    private function changeUserStatus($post, $value)
    {
        DB::beginTransaction();
        try {
            $array = [];
            if (isset($post['modelId'])) {
                $array[] = $post['modelId'];
            } else {
                $array = $post['id'];
            }

            $payload[$post['field']] = $value;

            $this->postRepository->updateByWhereIn('user_category_id', $array, $payload);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
            return false;
        }
    }

    private function paginateSelect()
    {
        return [
            'posts.id',
            'tb2.name',
            'tb2.canonical',
            'posts.publish',
            'posts.image',
            'posts.level',
            'posts.order',
        ];
    }

    private function payload()
    {
        return ['follow', 'publish', 'image', 'album', 'post_catalogue_id'];
    }

    private function payloadLanguage()
    {
        return ['name', 'description', 'content', 'meta_title', 'meta_description', 'meta_keyword', 'canonical'];
    }

    private function catalogue($request)
    {
        $catalogueIds = [];

        $formCatalogueIds = $request->input('catalogue', []);
        if (is_array($formCatalogueIds)) {
            $catalogueIds = array_merge($catalogueIds, $formCatalogueIds);
        } else {
        }

        $postId = $request->post_catalogue_id;
        if (!is_null($postId)) {
            $catalogueIds[] = $postId;
        }

        return array_unique($catalogueIds);
    }
}
