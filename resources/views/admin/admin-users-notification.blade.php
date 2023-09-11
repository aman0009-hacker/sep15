<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
.panel-default > .panel-heading {
    color: #333;
    background-color: #fcfcfc;
    border-color: #ddd;
    border-color: rgba(221,221,221,0.85);
}
.box-header.with-border {
    border-bottom: 0px solid #f4f4f4 !important;
}
.panel
{
    background-color: #00C0EF!important;

}
.notification2
{
    background-color: #00C0EF!important;
    border-top:0px!important;
    margin-bottom: 0px!important;
    box-shadow: 0px;
}
.showBtn
{
    display: block;
    text-align: center;
    color: white;
    background-color: #006680;
    padding: 3px;
}
.showBtn:hover .fa.fa-arrow-right
{
margin-left: 10px;
transition:0.5s;
}
.fa.fa-arrow-right
{
    transition:0.5s;
}
a:hover{
    color: white;
}
.nonotification
{
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items:center;
    height: 100%;
    color:#fff;
}
</style>

<div id="panel_header">
    <div class="row">
        <div class="user name"style="display:flex;justify-content:space-between;align-items:center; margin-bottom: 10px; ">
            <h3 style="font-size:25px; font-weight:600; color:white; margin-left:25px;">New Users</h3>
            <i class="fa fa-users" style="font-size:50px; color:#00A3CB; margin-right:15px;"></i>
            {{-- <h3 id="count" style="font-size:25px; font-weight:600; color:white; margin-left:25px;"></h3> --}}
        </div>

    </div>
		<div class="panel panel_yard" id="new-cards">

		      {{-- <strong class="default"><i class="fa fa-user"></i><span style="margin-left: 5px; " id="name"></span> </strong> placed a new order! --}}
		    {{-- </div> --}}


	  </div>
      <hr style="border-top: 1px solid #00A3CB;">
    </div>
    <div>
      <a href="admin/auth/user" class="showBtn" >Show All <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
    </div>
<script>

let header=document.getElementById('panel_header');
let addclass=header.parentNode.parentNode.parentNode;
let addclass2=header.parentNode.parentNode;
addclass.classList.add('notification1');
addclass2.classList.add('notification2');

let count = document.getElementById('name');
let content=document.createElement('span');
let user = document.getElementById('users_id');
// Append to body:
    $.ajax({
        url:'/notifi/users',
        method:'GET',
        datatype:'JSON',
        success:function(response){
    let latestnames=response.data;
    // console.log(latestnames);
    let arr=[];
    let html = ``;
    if(latestnames.length>0)
    {
        Array.from(latestnames).forEach(element => {

            html +=`<div id="users_id" class="alert alert-info"><strong class="default"><i class="fa fa-bell"></i><span style="margin-left: 5px; " id="name">${element.name+ " " + element.
            last_name}</span> </strong> sent registration to PSIEC.</div>`;
        });
    }
    else
    {
        html=`<strong class="default nonotification"><span style="margin-left: 5px; " id="name">No Notification Yet !</span> </strong> `;
    }
        $('#new-cards').html(html);





    }
});

</script>
