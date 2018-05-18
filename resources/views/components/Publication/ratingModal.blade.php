<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModal">Votre note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <form action="{{ route('tutorial.rating',['slug' =>$tuto->slug] )}}" method="POST" class="form-control">
                                @csrf
                                    <input type="radio" name="rate" value="1"> 1 <br>
                                    <input type="radio" name="rate" value="2"> 2 <br>
                                    <input type="radio" name="rate" value="3"> 3 <br>
                                    <input type="radio" name="rate" value="4"> 4 <br>
                                    <input type="radio" name="rate" value="5"> 5 <br>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Sauvegarder les changements</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('ratingScript')
    <script>

        var $star_rating = $('.star-rating .far');

        var SetRatingStar = function () {
            return $star_rating.each(function () {
                if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                    return $(this).removeClass('far fa-star').addClass('fas fa-star');
                } else {
                    return $(this).removeClass('fas fa-star').addClass('far fa-star');
                }
            });
        };

        $star_rating.on('mouseover', function () {
            $star_rating.siblings('input.rating-value').val($(this).data('rating'));
            return SetRatingStar();
        });

        SetRatingStar();

        $(document).ready({});
    </script>
@endpush