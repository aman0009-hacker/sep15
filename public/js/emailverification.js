let verify=document.getElementById('emailverification');

    

let buttonsubmit=verify.parentNode;

let findlabel=buttonsubmit.querySelector('label')
findlabel.setAttribute('id','emaillabel')
let sndbutton=document.createElement('span');
sndbutton.innerHTML=`<a href="#" style="margin-left: 10px;padding: 6px 26px;background-color: #00a65a;color: #fff;border: 1px solid #00a65a;border-radius: 3px;" id="Sendemail" >Send</a>`;

buttonsubmit.append(sndbutton);





let verifyparent=verify.parentNode.parentNode;
let makeelement=document.createElement('div');
makeelement.setAttribute('id','verifiction_head');
makeelement.innerHTML=`<label for="emailotp">OTP</label><input type="text" id="emailotp" placeholder="InputOtp"><a href="#"style="margin-left: 10px;padding: 6px 26px;background-color: #00a65a;color: #fff;border: 1px solid #00a65a;
border-radius: 3px;">Verify</a><a href="#"style="margin-left: 10px;padding: 6px 10px;background-color: red;color: #fff;border: 1px solid red;border-radius: 3px;">Resend Otp</a>
    `

verifyparent.append(makeelement);









let getdata=document.getElementById('Sendemail');
getdata.addEventListener('click',function(){
    let emailvalue=document.querySelector('input[type="email"]');
    console.log(emailvalue);
   
$.ajax({
    url:'sendemailtoadmin',
    method:'get',
    datatype:'json',
    success:function(response)
    {
        console.log('send');
    }
})
});