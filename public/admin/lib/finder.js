(
    function ($) {
        "use strict"
        var HT = {}

        HT.inputImage = () => {
            $(document).on('click', '.input-image', function () {
                let _this = $(this)
                let filUpload = _this.attr('data-upload')
                HT.BrowseServerInput($(this), filUpload)
            })
        }

       HT.BrowseServerInput = (object, type) => {
            if (typeof(type) == 'undefined') {
                type = 'Images'
            }

            var finder = new CKFinder.modal();
            finder.resourceType = type
            finder.selectActionFunction = function (fileUrl, data){
                console.log(fileUrl)
                // fileUrl = fileUrl.replace(BASE_URL, '/')
                object.val(fileUrl)
            }
            finder.popup()
       }

        $(document).ready(function (){
            HT.inputImage()
        })
    }   
)(jQuery)