<div class="ibox">
    <div class="ibox-title">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <h5>Album Ảnh</h5>
            <div class="upload-album">
                <a href="" class="upload-picture">Chọn hình</a>
            </div>
        </div>
    </div>


    <div class="ibox-content">
        <div class="row">
            <div class="col-md-12">
                @if (!isset($album) || count($album) == 0)
                    <div class="click-to-upload">
                        <div class="icon">
                            <a href="" class="upload-picture">
                                <svg style="width: 120px;" fill="#000000" viewBox="0 0 32 32" id="icon"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: none;
                                                }
                                            </style>
                                        </defs>
                                        <title>no-image</title>
                                        <path
                                            d="M30,3.4141,28.5859,2,2,28.5859,3.4141,30l2-2H26a2.0027,2.0027,0,0,0,2-2V5.4141ZM26,26H7.4141l7.7929-7.793,2.3788,2.3787a2,2,0,0,0,2.8284,0L22,19l4,3.9973Zm0-5.8318-2.5858-2.5859a2,2,0,0,0-2.8284,0L19,19.1682l-2.377-2.3771L26,7.4141Z">
                                        </path>
                                        <path
                                            d="M6,22V19l5-4.9966,1.3733,1.3733,1.4159-1.416-1.375-1.375a2,2,0,0,0-2.8284,0L6,16.1716V6H22V4H6A2.002,2.002,0,0,0,4,6V22Z">
                                        </path>
                                        <rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>"
                                            class="cls-1" width="32" height="32"></rect>
                                    </g>
                                </svg>
                            </a>
                            <div class="small-text">Sử dụng nút chọn ảnh hoặc click vào đây để thêm ảnh</div>
                        </div>
                    </div>
                @endif

                @if (isset($album) && count($album))
                    <div class="upload-list {{ count($album) ? '' : 'hidden' }}">
                        <div class="row">
                            <ul id="sortable" class="clearfix data-album sortui ui-sortable">
                                @foreach ($album as $key => $value)
                                    <li class="ui-state-default">
                                        <div class="thumb">
                                            <span class="span image img-scaledown">
                                                <img src="{{ $value }}" alt="">
                                                <input type="hidden" name="album[]" value="{{ $value }}">
                                            </span>
                                            <button class="delete-image"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="upload-list hidden">
                        <div class="row">
                            <ul id="sortable" class="clearfix data-album sortui ui-sortable">

                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
