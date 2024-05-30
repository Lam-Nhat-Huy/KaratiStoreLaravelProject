(
    function ($) {
        "use strict"
        var HT = {}
        var document = $(document)

        HT.swicthery = () => {
            $('.js-switch').each(function () {
               var swicthery = new Switchery(this, {color: '#1AB394'})
            })
        }

        HT.select2 = () => {
            $('.setupSelect2').select2()
        }

        document.ready(function (){
            HT.swicthery()
            HT.select2()
        })
    }
)(jQuery)