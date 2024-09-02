<div class="toast-container position-fixed text-white bottom-0 end-0 p-3">
    <div id="errorToast" class="toast bg-theme-clr toast-error-theme text-white align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body ms-0">
                <div class="custom-toast">
                    <header class="toast-head">
                        <figure><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <g clip-path="url(#clip0_318_243)">
                              <path d="M2.08397 15.9079H13.916C15.2138 15.9079 16 14.9199 16 13.6389C16 13.2455 15.8931 12.8352 15.7023 12.4668L9.77861 1.14705C9.38165 0.385139 8.70231 0 7.99997 0C7.29769 0 6.61066 0.385139 6.22137 1.14705L0.29771 12.4668C0.0916031 12.8436 0 13.2455 0 13.6389C0 14.9199 0.786259 15.9079 2.08397 15.9079Z" fill="#E53017" fill-opacity="0.85"/>
                              <path d="M8.00731 10.315C7.61034 10.315 7.389 10.0638 7.38131 9.62003L7.2821 5.06537C7.27448 4.62162 7.57217 4.30347 7.99962 4.30347C8.41189 4.30347 8.73244 4.63 8.72482 5.07374L8.61037 9.62003C8.60268 10.0722 8.38134 10.315 8.00731 10.315ZM8.00731 13.1198C7.54924 13.1198 7.15234 12.7179 7.15234 12.224C7.15234 11.7215 7.54162 11.3197 8.00731 11.3197C8.4653 11.3197 8.85465 11.7132 8.85465 12.224C8.85465 12.7263 8.45768 13.1198 8.00731 13.1198Z" fill="white"/>
                            </g>
                            <defs>
                              <clipPath id="clip0_318_243">
                                <rect width="16" height="16" fill="white"/>
                              </clipPath>
                            </defs>
                          </svg></figure>
                        <h3 class="toast-title">Unable to Complete Operation!</h3>

                    </header>
                    <p>Your admission has been completed and sent email to completed the profile</p>
                </div>
                {{-- <ul class="custom-error-list">

                    <li>Admission Successful</li>
                 @foreach ($errors->all() as $error)
                        @if ($error === 'admission-successful' || $error === 'success' )
                            <li>Admission Successful</li>
                        @else
                            <li>{{ $error }}</li>
                        @endif
                    @endforeach
                </ul> --}}
            </div>
            <a class="btn-close-toast btn-close-toast-error me-2 m-auto mt-2 align-self-start" data-bs-dismiss="toast" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </div>
    </div>
</div>
