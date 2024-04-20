<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="{{ asset('frontend') }}/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>

<script>
    $(document).ready(function () {
        $('#categoryToggle').click(function () {
            $('.mobile__category').toggle();
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.apprelToggle').click(function () {
            var $subcategory = $(this).closest('li').find('.mobile_sub_category');
            $('.mobile_sub_category').not($subcategory).hide();
            $subcategory.toggle();
        });

        $('.categoryToggleMobile').click(function () {
            var $subcategory = $(this).closest('li').find('.mobile_sub_category');
            $('.mobile_sub_category').not($subcategory).hide();
            $subcategory.toggle();
        });

        $(document).click(function (event) {
            if (!$(event.target).closest('.mobile__category').length) {
                $('.mobile_sub_category').hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.lastToggle').click(function () {
            var $lastCategoryList = $(this).closest('li').find('.mobile__last__category');
            $lastCategoryList.toggle();
        });

        $(document).click(function (event) {
            if (!$(event.target).closest('.last_toggle').length) {
                $('.mobile__last__category').hide();
            }
        });
    });
</script>