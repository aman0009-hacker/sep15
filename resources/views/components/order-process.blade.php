<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Process</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/congratulations.css')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/login-signup/admin_logo_img.png')}}">
</head>

<body>
    <div class="main">
        <div class="container-fluid p-4">
            <div class="sign-up-page">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="background-image d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="user-welocme">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span class="welcome-text">WELCOME TO
                                                            <span class="welcome-border"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 industries-export-text">
                                                        <span>Punjab Small Industries & Export Corporation</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span class="state-text">(A State Government Undertaking)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-none d-md-block">
                                        <div class="col-12">
                                            <div class="sign-up-footer">
                                                <div class="row align-items-baseline">
                                                    <div class="col-4">
                                                        <div class="policy-warranty-link">
                                                            <a href="#">Privacy Policy</a>
                                                            <span class="text-white"> | </span>
                                                            <a href="#">PSIEC Product Warranty</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 copy-right-section">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <p class="copy-right-text">© Copyright 2023 PSIEC. All
                                                                    rights reserved.</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 owners-text">
                                                                <p>All trademarks used herein are property of their
                                                                    respective owners.</p>
                                                                <p>Any use of third party trademarks is for
                                                                    identification purposes only and does not imply
                                                                    endorsement.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 user-signUp">
                        <div class="user-signUp-form process-pending-form d-block">
                            {{-- @php
                            echo $txtOrderGlobalModalID;
                            @endphp --}}
                            <?php
                                $encryptedResponse = request('encryptedResponse');

                                if(isset($encryptedResponse) && !empty($encryptedResponse)) {
                                $decryptedResponse = Illuminate\Support\Facades\Crypt::decrypt($encryptedResponse);
                                $paymentResponse = $decryptedResponse['paymentResponse'] ?? '';
                                $reference_no = $decryptedResponse['reference_no'] ?? '';
                                $transaction_id = $decryptedResponse['transaction_id'] ?? '';
                                // $txtOrderGlobalModalID=$txtOrderGlobalModalID ?? '';
                                $txtOrderGlobalModalID=Session::get('txtOrderGlobalModalID') ?? '';
                             if( $paymentResponse!="" && $paymentResponse!=null && $paymentResponse=="SUCCESS")
                               {
                              ?>
                            <?php
                            }
                           else if($paymentResponse!="" && $paymentResponse!=null && $paymentResponse=="FAILURE")
                               {
                                ?>
                            <div class="alert alert-warning" role="alert">
                                <p>Payment has not verified. Kindly try again or contact system administrator for
                                    further process.</p>
                            </div>
                            <?php
                               }
                               else
                               {
                                ?>
                            <div class="alert alert-warning" role="alert">
                                <p>Payment has not verified. Kindly try again or contact system administrator for
                                    further process.</p>
                            </div>
                            <?php
                               }
                            }
                           ?>
                            <form method="post" action="{{route('payment.process.data.order')}}">
                                @csrf
                                <div class="row text-center">
                                    <div class="col-12">
                                        <img src="{{asset('images/login-signup/doc-success.png')}}"
                                            alt="process-pending" class="img-fluid process-pending" width="220"
                                            height="220">
                                        <h1 class="sign-up-text document-text">Payment Process</h1>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="number" class="form-control" placeholder="Enter amount"
                                                aria-label="Amount" name="amountOrder" id="amountOrder" value="200000" readonly required>
                                            <span class="input-group-text">.00</span>
                                           
                                        </div>
                                        <div class="conditionterms mt-4">
                                            <input type="checkbox"  id="advanceterms" name="accept_terms" required style="height:16px;vertical-align:-3px">
                                            <label class="form-check-label ms-2" for="acceptTerms">I accept the <a href="{{asset('policy.pdf')}}" target="_blank">Terms and Conditions</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="action">
                                            <button type="submit" class="btn continue-btn w-100 "disabled id="advancebutton">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row d-block d-md-none">
                            <div class="col-12">
                                <div class="sign-up-footer">
                                    <div class="row align-items-baseline">
                                        <div class="col-4">
                                            <div class="policy-warranty-link">
                                                <a href="#">Privacy Policy</a>
                                                <span class="text-white"> | </span>
                                                <a href="#">PSIEC Product Warranty</a>
                                            </div>
                                        </div>
                                        <div class="col-8 copy-right-section">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="copy-right-text">© Copyright 2023 PSIEC. All rights
                                                        reserved.</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 owners-text">
                                                    <p>All trademarks used herein are property of their respective
                                                        owners.</p>
                                                    <p>Any use of third party trademarks is for identification purposes
                                                        only and does not imply endorsement.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
   let changeterms=document.getElementById('advanceterms');
        
     changeterms.addEventListener('click',function()
     {
        if(changeterms.checked===true)
        {
           document.getElementById('advancebutton').disabled=false;
        }
        else
        {
            document.getElementById('advancebutton').disabled=true;
        }
     })

  
</script>
