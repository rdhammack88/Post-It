$(document).ready(function() {
    $('#mainNav .navbar-nav a').on('click', function() {
        $('#mainNav .navbar-nav')
            .find('li.activeLink')
            .removeClass('activeLink');
        $(this)
            .parent('li')
            .addClass('activeLink');
    });

    /** On upload of image, show image before actual upload **/
    $('input[name="avatar"]').change(function() {
        var user_avatar_preview = $('.user_avatar_preview');
        console.log(user_avatar_preview);
        var max_file_size = 6242880;
        // Correct File Type Selected
        if (
            this.files &&
            this.files[0].size <= max_file_size &&
            (this.files[0].type == 'image/jpg' ||
                this.files[0].type == 'image/jpeg' ||
                this.files[0].type == 'image/png' ||
                this.files[0].type == 'image/gif')
        ) {
            var render = new FileReader();
            render.onload = function(e) {
                user_avatar_preview.attr('src', e.target.result);
                $('.imageTypeError').addClass('d-none');
                $('.imageSizeError').addClass('d-none');
            };

            render.readAsDataURL(this.files[0]);
        }
        // If the CORRECT File Type but INCORRECT File Size
        else if (
            this.files &&
            (this.files[0].type == 'image/jpg' ||
                this.files[0].type == 'image/jpeg' ||
                this.files[0].type == 'image/png' ||
                this.files[0].type == 'image/gif') &&
            this.files[0].size > max_file_size
        ) {
            $('.imageTypeError').addClass('d-none');
            $('.imageSizeError').removeClass('d-none');
            //			console.log("Wrong file type!");
            //			console.log(this.files);
        }
        // If the INCORRECT File Type but CORRECT File Size
        else if (
            this.files &&
            !(
                this.files[0].type == 'image/jpg' ||
                this.files[0].type == 'image/jpeg' ||
                this.files[0].type == 'image/png' ||
                this.files[0].type == 'image/gif'
            ) &&
            this.files[0].size <= max_file_size
        ) {
            $('.imageTypeError').removeClass('d-none');
            $('.imageSizeError').addClass('d-none');
        }
        // If the INCORRECT File Type AND INCORRECT File Size
        else if (
            this.files &&
            !(
                this.files[0].type == 'image/jpg' ||
                this.files[0].type == 'image/jpeg' ||
                this.files[0].type == 'image/png' ||
                this.files[0].type == 'image/gif'
            ) &&
            this.files[0].size > max_file_size
        ) {
            $('.imageTypeError').removeClass('d-none');
            $('.imageSizeError').removeClass('d-none');
            //			console.log("Wrong file type!");
            //			console.log(this.files);
        }
        //		else if(this.files && this.files[0].size > max_file_size){
        //			$('.imageSizeError').removeClass('d-none');
        //		}
    });
});
