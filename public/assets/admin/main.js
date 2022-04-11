
// -----------
const alert = {
  
   show(msg,st) {
   clearTimeout(this.hideTimeout);
         this.el = document.createElement("div");
         this.el.className = " text-center px-6 py-4 opacity-100 bg-black  rounded-md text-lg items-center mx-auto w-96 top-10 right-0 left-0 fixed z-10  ";
         document.body.appendChild(this.el);
         this.el.textContent = msg;
   // this.el.classList.replace("opacity-0","opacity-100");
 
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
 }
 