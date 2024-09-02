<div class="toast-container position-fixed text-white bottom-0 end-0 p-3">
    <div id="successToast" class="toast bg-theme-clr toast-success-theme text-white align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body ms-0">
                <div class="custom-success-toast">
                    <header class="toast-head">
                        <figure>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7939 1.23097C10.2293 1.03949 9.62549 0.936035 8.99968 0.936035C6.15317 0.936035 3.76186 3.07635 3.44752 5.90545L3.19572 8.17167L3.18926 8.22929C3.06032 9.35299 2.69456 10.4366 2.11612 11.4085L2.08633 11.4583L1.5083 12.4217C0.983744 13.2959 0.721468 13.7331 0.778087 14.0919C0.815762 14.3307 0.938651 14.5477 1.12401 14.7029C1.40259 14.936 1.91236 14.936 2.93191 14.936H15.0674C16.087 14.936 16.5968 14.936 16.8753 14.7029C17.0607 14.5477 17.1836 14.3307 17.2213 14.0919C17.2779 13.7331 17.0156 13.2959 16.4911 12.4217L15.913 11.4583L15.8832 11.4085C15.427 10.6419 15.1031 9.80586 14.9233 8.93546C12.1971 8.89464 9.99968 6.67196 9.99968 3.93604C9.99968 2.93934 10.2913 2.01076 10.7939 1.23097ZM13.2738 2.92487C13.0996 3.22155 12.9997 3.56713 12.9997 3.93604C12.9997 4.88582 13.6617 5.68098 14.5495 5.88518C14.4201 4.75738 13.9605 3.73985 13.2738 2.92487Z" fill="#149E22"/>
                                <path d="M6 14.936C6 15.33 6.0776 15.7201 6.22836 16.0841C6.37913 16.4481 6.6001 16.7788 6.87868 17.0574C7.15726 17.3359 7.48797 17.5569 7.85195 17.7077C8.21593 17.8584 8.60603 17.936 9 17.936C9.39397 17.936 9.78407 17.8584 10.1481 17.7077C10.512 17.5569 10.8427 17.3359 11.1213 17.0574C11.3999 16.7788 11.6209 16.4481 11.7716 16.0841C11.9224 15.7201 12 15.33 12 14.936L9 14.936H6Z" fill="#149E22"/>
                                <circle cx="15" cy="3.93604" r="2.5" fill="#149E22" stroke="white"/>
                              </svg>
                        </figure>
                        <h3 class="toast-title">Admission Successful !</h3>

                    </header>
                    <p>Your admission has been completed and email has been sent to complete the profile</p>
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
            <a class="btn-close-toast btn-close-toast-success me-2 m-auto mt-2 align-self-start" data-bs-dismiss="toast" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </div>
    </div>
</div>
