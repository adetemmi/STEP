// Do nav js here






//Modal Js START
let btn = document.getElementById("letstalk");
let modal = document.getElementById("modalContainer");
let closebutn = document.getElementsByClassName("close");
function openModal() {
    modal.style.display= "block";
}
function closeModal() {
    modal.style.display= "none";
}
 //function when you click anywhere outside the modal.
function winclose(event) {
    if(event.target == modal){
        modal.style.display ="none";
    }
  
}

//Modal Js END

// Project Modal START
let btn_startProject = document.getElementById("start_project");
let startProjectModal = document.getElementById("projectmodal");
let closeprojectModal = document.getElementsByClassName("btn_close")[1];
function oponProjectstart() {
    startProjectModal.style.display = "block";   
}
function closeprojectStart() {
    startProjectModal.style.display = "none";
    
}
function projectwinclose(event) {
    if(event.target == startProjectModal){
        startProjectModal.style.display ="none";
    }
  
}


//Project Modal END
