
  // لتحديد جميع التشيك بوكس للرسايل النصيه
function checkAllSms(myCheckbox){
  var checkboxes_sms = document.querySelectorAll(".sms");
    if(myCheckbox.checked == true){
      checkboxes_sms.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
      checkboxes_sms.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}
//  لتحديد جميع التشيك بوكس
function checkAllConfirm(myCheckbox){
  var checkboxes_confirm = document.querySelectorAll("#confirm");
    if(myCheckbox.checked == true){
      checkboxes_confirm.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
      checkboxes_confirm.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}


// document.getElementById('directorate_id').focus();
// ---------------ALERT-----------


function alertt(msg,st) 
{
      clearTimeout(this.hideTimeout);
      this.el = document.createElement("div");
      this.el.className = "p-4 rounded-md text-lg flex items-center mx-auto w-96 top-10 z-10 fixed left-0 right-0 ";
      document.body.prepend(this.el);
      this.el.textContent = msg;


  if (st ==="success") {
    this.el.classList.add("bg-green-200");
    this.el.classList.add("border-r-4");
    this.el.classList.add("border-green-600");
     }
  else if ( st === "error"){
    this.el.classList.add("bg-red-200");
    this.el.classList.add("border-r-4");
    this.el.classList.add("border-red-600");
 }
    this.hideTimeout = setTimeout(() => {
    this.el.remove();
    }, 3000);
 }


// ---------------END-ALERT-----------
function playSound() {
  var audio = new Audio('/success_sound.wav');
  audio.play();
}

function newAlert(type,text)
{
  $(type+'Text').text(text);
  $(type).addClass('flex').removeClass('hidden');
  // playSound();
  setTimeout(() => {
      $(type).addClass('hidden').removeClass('flex');
  }, 2000);
}



function showPreview(event){
   if(event.target.files.length > 0){
     var src = URL.createObjectURL(event.target.files[0]);
     var preview = document.getElementById("file-ip-1-preview");
     var svg = document.getElementById("SVG");
     preview.src = src;

     svg.style.display = "none";
     preview.style.display = "block";
   }
 }


function showPreviewUser(event){
   if(event.target.files.length > 0){
     var src = URL.createObjectURL(event.target.files[0]);
     var preview = document.getElementById("file-ip-1-preview");
    
     preview.src = src;
     preview.style.display = "block";
   }
 }

 function showPreviewFm(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("Fm-preview");
   
    preview.src = src;
    preview.style.display = "block";
  }
}

 function dropClick() {
    const drop = document.getElementById("dropDown"); 
      drop.classList.toggle("hidden");
 };


// تحويل رقم الوطني الى رقم باسوورد
 function convertNumToIdentity(numId)
 {  
  console.log("convertNumToIdentity: " + numId);
   const slugInput = document.getElementById('citPassword');
   slugInput.value = numId;

 }
// تحويل اسم المراقب الكامل واخذ اول اسم منه
 function convertStrToUser(text)
{
 const arrText =  text.split(" ");
      
       const slugInput = document.getElementById('obsUserName');
       slugInput.value = arrText[0];

}



 function deleteAlert(id)
 {

  console.log("deleteAlert: " + id);
   const alert = document.getElementById('deletionPoping');
  //  const action = document.getElementById('action-div');
  //  action.classList.replace('flex','hidden');
  window.deletionPopingId.setAttribute('value',id);
   alert.classList.replace('hidden','flex');
  
 }

// لجعل تركيز على السيليكت
 const f = (idOfElement) => {
      document.getElementById(idOfElement).focus();
 }

// لجعل مده زمنيه لتنفيذ الانيمشن والعنصر اللذي بعده
 function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}