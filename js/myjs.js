
     //cript para o preloader
     document.addEventListener("DOMContentLoaded", function(){
        $('.preloader-background').delay(100).fadeOut('slow');

        $('.preloader-wrapper')
            .delay(100)
            .fadeOut();
    });


    //script para o navbar
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });

    $(document).ready(function() {
        M.updateTextFields();
    });
