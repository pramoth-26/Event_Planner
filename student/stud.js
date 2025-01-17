var DAta=''
document.addEventListener('DOMContentLoaded',(event)=> {
  const data = localStorage.getItem('sharedData');
  DAta=document.getElementById('displayData').innerText = data;
 
});
function main(){
   const data = document.getElementById('dataInput').value;
  localStorage.setItem('sharedData', data);
  
  window.location.href = 'details.php'; // Redirect to Page 2
}
