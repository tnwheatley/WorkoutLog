const name = document.getElementById('username')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
        let messages = []
        if (name.value === '' || name.value == null){
                messages.push('Username is required')
        }

        if (password.value === '' || password.value == null){
                messages.push('Password is required')
        }

        if(password.value.length <=6){
                messages.push('Password must be longer than 6 characters')
        {
         if(password.value.length >=20){
                messages.push('Password mush be shorter than 20 characters')
        }

        if (messages.length > 0){
                e.preventDefault()
                errorElement.innerText = messages.join(', ')
        }
})

