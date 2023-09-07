
<style>
  .extrahiddendoc
  {
    display: none!important;
    
  
  }
</style>


@extends('layouts.guest')
@section('content')
<div class="main">
  <div class="container-fluid p-4">
    <div class="sign-up-page">
      <div class="row">
        <div class="col-12 col-md-7">
          <div class="background-image d-flex align-items-center">
            <div class="row">
              <div class="col-12">
                <div class="row">+
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
                <div class="row">
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
                              <p class="copy-right-text">© Copyright 2023 PSIEC. All rights reserved.</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 owners-text">
                              <p>All trademarks used herein are property of their respective owners.</p>
                              <p>Any use of third party trademarks is for identification purposes only and does not
                                imply endorsement.</p>
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
          <div class="user-signUp-form user-document-form">
            <div class="row text-center">
              <div class="col-12">
                <img src="{{asset('images/login-signup/document-process.png')}}" alt="document-process"
                  class="img-fluid document-process" width="117" height="160">
                <h1 class="sign-up-text document-text"  style="line-height: 50px">Document Upload Process</h1>
              </div>
            </div>
            @if (Auth::check())
            <?php 
              if(isset(Auth::user()->state))
              {
               Session::put('currentId', Auth::user()->id );
               $userCurrentId=Session::get('currentId');
              }
            ?>
            @else
            @if (Session::has('currentId'))
            <?php
                      $userCurrentId=Session::get('currentId');
                      //echo $userCurrentId;
                  ?>
            @else
            <script>
              window.location.href="/signup";
            </script>
            @endif
            @endif
            @if(count($errors))
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <form class="upload-document-form" method="post" enctype="multipart/form-data"
              action="{{route('file.upload.post')}}">
              @csrf
              {{-- <input type="hidden" name="documents"
                value="{{json_encode(Session::get('dataDocuments'),TRUE) ?? ''}}" /> --}}
              <div class="row mb-4">
                <input type="hidden" name="txtIds" id="txtIds" value="{{ $userCurrentId ?? '' }}" />
                <div class="col-12 col-lg-4 col-md-6 text-lg-end text-center" id="gstDataId" style="position:relative" >
                  @if($allValues['gstfile']==0)

                  <img src="images/error/close.png" style="width: 29px; position: absolute;top: 28px;left: 49%;">
                  @endif
                  <div class="mb-3">
                    <input type="file" id="gstFile"  name="gstFile" hidden {{$allValues['gstfile']=="1"?'':"disabled"}}>
                    <label for="gstFile" class="upload-files" class="gstlabel">
                      <div class="row text-center">
                        <div class="col-12">
                          <img src="{{asset('images/login-signup/upload-icon.png')}}" alt="upload file"
                            class="img-fluid upload-icon gsi-icon-up" width="" height="" id="gstpic">
                          <p class="upload-text text_ellips" id="gstdoc">Upload GST No.<br> Certificate</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 text-lg-end text-center" id="msmeDataId" style="position:relative" >
                  @if($allValues['msmefile']==0)

                  <img src="images/error/close.png" style="width: 29px; position: absolute;top: 28px;left: 49%;">
                  @endif
                  <div class="mb-3">
                    <input type="file" id="msmeFile" name="msmeFile" hidden {{$allValues['msmefile']=="1"?'':"disabled"}}>
                    <label for="msmeFile" class="upload-files">
                      <div class="row text-center">
                        <div class="col-12">
                          <img src="{{asset('images/login-signup/upload-icon.png')}}" alt="upload file"
                            class="img-fluid upload-icon gsi-icon-up" id="msmepic">
                          <p class="upload-text text_ellips" id="msmedoc">Upload MSME/Udyam <br>Certificate</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 text-lg-end text-center" id="itrDataId" style="position:relative" >
                  @if($allValues['itrfile']==0)

                  <img src="images/error/close.png" style="width: 29px; position: absolute;top: 28px;left: 49%;">
                  @endif
                  <div class="mb-3">
                    <input type="file" id="itrFile" name="itrFile" hidden {{$allValues['itrfile']=="1"?'':"disabled"}}>
                    <label for="itrFile" class="upload-files">
                      <div class="row text-center">
                        <div class="col-12">
                          <img src="{{asset('images/login-signup/upload-icon.png')}}" alt="upload file"
                            class="img-fluid upload-icon gsi-icon-up" id="itrpic">
                          <p class="upload-text text_ellips" id="itrdoc">Upload ITR <br> Certificate</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12 col-lg-4 col-md-6 text-lg-end text-center" id="aadharDataId" style="position:relative" >
                 
                  @if($allValues['aadharfile']==0)

                  <img src="images/error/close.png" style="width: 29px; position: absolute;top: 28px;left: 49%;">
                  @endif
                  <div class="mb-3">
                    <input type="file" id="aadharFile" name="aadharFile" hidden {{$allValues['aadharfile']=="1"?'':"disabled"}}>
                    <label for="aadharFile" class="upload-files">
                      <div class="row text-center">
                        <div class="col-12">
                          <img src="{{asset('images/login-signup/upload-icon.png')}}" alt="upload file"
                            class="img-fluid upload-icon gsi-icon-up" id="aadharpic">
                          <p class="upload-text text_ellips" id="aadhardoc">Upload Aadhaar<br> Card</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 text-lg-end text-center" id="panDataId"style="position:relative" >
                  @if($allValues['panfile']==0)

                  <img src="images/error/close.png" style="width: 29px; position: absolute;top: 28px;left: 49%;">
                  @endif
                  
                  <div class="mb-3">
                    <input type="file" id="panFile" name="panFile" hidden  {{$allValues['panfile']=="1"?'':"disabled"}}>
                    <label for="panFile" class="upload-files">
                      <div class="row text-center">
                        <div class="col-12">
                          <img src="{{asset('images/login-signup/upload-icon.png')}}" alt="upload file"
                            class="img-fluid upload-icon gsi-icon-up" id="panpic">
                          <p class="upload-text text_ellips" id="pandoc">Upload Pan <br>Card</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 text-lg-end text-center" id="utilityDataId" style="position:relative" >
                  @if($allValues['utilityfile']==0)

                  <img src="images/error/close.png" style="width: 29px; position: absolute;top: 28px;left: 49%;">
                  @endif
                  <div class="mb-3">
                    <input type="file" id="utilityFile" name="utilityFile" hidden {{$allValues['utilityfile']=="1"?'':"disabled"}}>
                    <label for="utilityFile" class="upload-files">
                      <div class="row text-center">
                        <div class="col-12">
                          <img src="{{asset('images/login-signup/upload-icon.png')}}" alt="upload file"
                            class="img-fluid upload-icon gsi-icon-up" id="utilitypic">
                          <p class="upload-text text_ellips" id="utilitydoc">Upload Capacity <br> Certificate</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
              </div>





{{-- start --}}

              <div class="row mb-3 extrahiddendoc" id="extradocuments">
                <div class="col-12 col-lg-4 col-md-6 text-lg-end text-center" id="extradocId1" style="position:relative" >
                 
                 
                  <div class="mb-3">
                    <input type="file" id="extradoc1" name="extradoc1" hidden >
                    <label for="extradoc1" class="upload-files">
                      <div class="row text-center">
                        <div class="col-12">
                          <img src="{{asset('images/login-signup/upload-icon.png')}}" alt="upload file"
                            class="img-fluid upload-icon gsi-icon-up" id="documetation1">
                          <p class="upload-text text_ellips" id="document1">Upload Extra<br> Doc</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 text-lg-end text-center" id="extradocId2"style="position:relative" >
                
                  
                  <div class="mb-3">
                    <input type="file" id="extradoc2" name="extradoc2" hidden  >
                    <label for="extradoc2" class="upload-files">
                      <div class="row text-center">
                        <div class="col-12">
                          <img src="{{asset('images/login-signup/upload-icon.png')}}" alt="upload file"
                            class="img-fluid upload-icon gsi-icon-up" id="documetation2">
                          <p class="upload-text text_ellips" id="document2">Upload Extra <br>Doc</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 text-lg-end text-center" id="extradocId3" style="position:relative" >
                  
                  <div class="mb-3">
                    <input type="file" id="extradoc3" name="extradoc3" hidden >
                    <label for="extradoc3" class="upload-files">
                      <div class="row text-center">
                        <div class="col-12">
                          <img src="{{asset('images/login-signup/upload-icon.png')}}" alt="upload file"
                            class="img-fluid upload-icon gsi-icon-up" id="documetation3">
                          <p class="upload-text text_ellips" id="document3">Upload Exta <br> Doc</p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12  text-center">
                    <div class="upload_validation"style="display:flex;align-items:center;width:100%;justify-content:center;">
                      <input type="checkbox" id="show_three_more" style="width:17px;height:16px">
                      <span class="text-danger ms-2">Are you three year old customer?</span>
                    </div>
                </div>
              </div>


{{-- end --}}


            



<div class="row mb-3">
                <div class="col-12">
                  {{-- <p class="format-text text-center">Choose any Format (JPG, PNG, PDF max. 5MB)</p> --}}
                  <p class="format-text text-center">Choose any Format (PDF max. 5MB)</p>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="action">
                    {{-- <a href="./updated-documents.html" class="btn continue-btn w-100">Continue</a> --}}
                    <button type="submit" class="btn continue-btn w-100">Continue</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    let extra=document.getElementById('show_three_more');
   
    let extradoc=document.getElementById('extradocuments');

    extra.addEventListener('click',function()
    {
      if(extra.checked===true)
      {
extradoc.classList.remove('extrahiddendoc');
      }
      else
      {
        extradoc.classList.add('extrahiddendoc');
      }
    })
  </script>
  @endsection

