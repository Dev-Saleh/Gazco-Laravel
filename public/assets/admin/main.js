var checkboxes_sms = document.querySelectorAll(".sms");
function checkAllSms(myCheckbox){
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

var checkboxes_confirm = document.querySelectorAll(".confirm");
function checkAllConfirm(myCheckbox){
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


  function alert(msg,st) 
  {
        clearTimeout(this.hideTimeout);
        this.el = document.createElement("div");
        this.el.className = "px-6 py-4 opacity-100  rounded-md text-lg flex items-center mx-auto w-96 top-10 right-0 left-0 fixed z-10  ";
        document.body.appendChild(this.el);
        this.el.textContent = msg;
  

    if (st ==="success") {
      this.el.classList.add("bg-green-200");
      this.el.classList.add("border-l-4");
      this.el.classList.add("border-green-600");
       }
    else if ( st === "error"){
      this.el.classList.add("bg-red-200");
      this.el.classList.add("border-l-4");
      this.el.classList.add("border-red-600");
   }
      this.hideTimeout = setTimeout(() => {
      this.el.classList.add("hidden");
      }, 3000);
   }


// ---------------END-ALERT-----------



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



 function dropClick() {
    const drop = document.getElementById("dropDown"); 
      drop.classList.replace("hidden","block");
 };



 function Slugify(text)
 {  
   const slugInput = document.getElementById('slugText');
  //   |/w+ if i dont want ? ! - ....

   let slug = text.split(/\s+/).filter((word)=>word.trim() !== "").join('_');
   slugInput.value = slug;

  console.log(slug);
 }



 function deleteAlert()
 {
   const alert = document.getElementById('delete-alert');
   const action = document.getElementById('action-div');
   action.classList.replace('flex','hidden');
   alert.classList.replace('hidden','flex');
  
 }