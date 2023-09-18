Array.from(document.getElementsByClassName('allbtn')).forEach(element => {
   element.addEventListener('click', function () {
      $('#OrderForm')[0].reset();
      let attr = element.getAttribute('id');
       document.getElementById("modalIdInput").value = attr;
      $('#openthemodal').modal('show');
   })
});

let item=document.getElementsByClassName('item_name');
Array.from(item).forEach(element=>{
   element.parentNode.parentNode.classList.add('main');

});

document.addEventListener('DOMContentLoaded', function() {
   // Get the Chequedate input element
   const chequedateInput = document.getElementById('Chequedate');

   // Get the current date in the format 'YYYY-MM-DD'
   const currentDate = new Date().toISOString().split('T')[0];

   // Set the minimum date for the Chequedate input to the current date
   chequedateInput.min = currentDate;



     // Get the OrderForm element
     const orderForm = document.getElementById('OrderForm');

     // Add an event listener to the form submission
     orderForm.addEventListener('submit', function(event) {
       // Get all file inputs with the class 'allitems'
       const fileInputs = document.querySelectorAll('input[type="file"].allitems');
 
       // Flag to keep track if any file failed validation
       let validationFailed = false;
 
       // Loop through each file input and validate the files
       for (const fileInput of fileInputs) {
         const files = fileInput.files;
         for (const file of files) {
           // Check file extension and size
           const allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf'];
           const maxFileSize = 5120; // 5 MB in KB
 
           const fileExtension = file.name.split('.').pop().toLowerCase();
           const fileSize = file.size / 1024; // Convert file size to KB
 
           if (!allowedExtensions.includes(fileExtension) || fileSize > maxFileSize) {
             validationFailed = true;
             break; // No need to continue checking other files if one fails
           }
         }
       }
 
       // If validation failed, prevent the form submission and show an error message
       if (validationFailed) {
         event.preventDefault();
         //alert('Please upload files in the correct format (JPEG, PNG, PDF) and size (up to 5 MB).');
         Swal.fire({
            title: 'Please upload files in the correct format (JPEG, PNG, PDF) and size (up to 5 MB).',
            showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
        });
       }
     });
});

let data=new Date();
let day=String(data.getDate()).padStart(2,"0"); 
let month=String(data.getMonth()+1).padStart(2,"0");
let year=data.getFullYear();
let hour=data.getHours();
let minute=String(data.getMinutes()).padStart(2,"0");
let today=year+"-"+month+"-"+day;
$('#Chequedate').attr('min',today);       




