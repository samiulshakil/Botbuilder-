<div class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="createAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header position-relative justify-content-center border-0">
                <h5 class="modal-title position-absolute" id="createAccountModalLabel">Create Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="modal-body__text text-center"></p>
                <form action="#!" class="modal__form">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control shadow-none" placeholder="Your email address" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control shadow-none" placeholder="Nickname (optional)">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="primary-btn" style="background-image: url('{{asset('')}}frontend/assets/images/button-mask/btn-mask-4.png');">
                            Continue
                        </button>
                    </div>
                </form>
                <p class="modal-body__text text-center">By signing up, you agree to our <a href="#!" class="modal-body__text__link">Terms of Service</a> and <a href="#!" class="modal-body__text__link">Privacy Policy</a></p>
            </div>
        </div>
    </div>
</div>