const username = document.getElementById('username')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) =>{
   let messages = []

   if(password.value.length <= 4){
    messages.push('Password must be longer than 4 characters')   
   }

   if(password.value.length >= 20){
    messages.push('Password must be less than 20 characters')   
   }

   if(password.value === 'password'){
    messages.push('Password cannot be password')   
   }

   if(messages.length > 0){
    e.preventDefault()
    errorElement.innerText = messages.join(', ') 
   }

}) 