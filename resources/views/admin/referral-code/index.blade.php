@extends( 'admin.layouts.master' )

@section( 'content' )
    <section class="section">
        <div class="section-header">
            <h1>Generate Referral Code</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Admin</a></div>
                <div class="breadcrumb-item"><a href="#">Referral Code</a></div>
                <div class="breadcrumb-item">Generate Code</div>
            </div>
        </div>
        <div class="section-body">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="buttons">
                                    <a href="javascript:" class="btn btn-info">Generate Code</a>
                                    <a href="javascript:" class="btn" id="referral_code">
                                        test code</a>
                                    <a href="javascript:" class="btn" id="copyButton" onclick="copyReferralLink()">
                                        <i class="fa fa-copy"></i> Copy</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input id="email" type="email" class="form-control" name="email"
                                                   autofocus="" placeholder="Email" aria-label="email">
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-lg btn-round btn-primary">
                                            Send Code
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push( 'scripts' )
    <script>
        const copyReferralLink = () => {
            const referralLink = document.getElementById('referral_code');
            const textToCopy = referralLink.innerText;

            const dummyElement = document.createElement('textarea');
            dummyElement.value = textToCopy;
            document.body.appendChild(dummyElement);
            dummyElement.select();
            document.execCommand('copy');
            document.body.removeChild(dummyElement);

            const copyButton = document.getElementById('copyButton');
            copyButton.innerHTML = '<i class="fa fa-copy"></i> Copied!';

            setTimeout(() => {
                copyButton.innerHTML = '<i class="fa fa-copy"></i> Copy';
            }, 3000);
        }

        {{--const flashSaleToggle = (cl_target, url_route) => {--}}
        {{--    ($ => {--}}
        {{--        $(() => {--}}
        {{--            $("body").on("click", cl_target, e => {--}}
        {{--                const $this = $(e.currentTarget);--}}
        {{--                const isChecked = $this.is(':checked');--}}
        {{--                const idToggle = $this.data('id');--}}

        {{--                $.ajax({--}}
        {{--                    url: url_route,--}}
        {{--                    method: "PUT",--}}
        {{--                    data: {--}}
        {{--                        isChecked: isChecked,--}}
        {{--                        idToggle: idToggle--}}
        {{--                    },--}}
        {{--                    success: res => {--}}
        {{--                        toastr.success(res.message);--}}
        {{--                    },--}}
        {{--                    error: (xhr, status, error) => {--}}
        {{--                        console.log(error);--}}
        {{--                    }--}}
        {{--                });--}}
        {{--            });--}}
        {{--        });--}}
        {{--    })(jQuery);--}}
        {{--}--}}

        {{--flashSaleToggle(".change-status", "{{ route('admin.flash-sale.change-status' )}}");--}}
        {{--flashSaleToggle(".change-show-at-home", "{{ route('admin.flash-sale.change-show-at-home') }}");--}}
    </script>
@endpush
