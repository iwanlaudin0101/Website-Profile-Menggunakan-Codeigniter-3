const scriptURL = 'https://script.google.com/macros/s/AKfycbyqREHQkUMPOz7lbpG3b8Qw0jIQF8GfGHgsJImsC_1bOzWckuGa2ien1KKnXzXDf9-svw/exec'
const form = document.forms['portofolio-contact-form']
const btnKirim = document.querySelector('.btn-kirim')
const btnLoading = document.querySelector('.btn-loading')
const myAlert = document.querySelector('.my-alert')

form.addEventListener('submit', e => {
    e.preventDefault()

    btnLoading.classList.toggle('d-none')
    btnKirim.classList.toggle('d-none')

    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => {
          console.log('Success!', response)
            btnLoading.classList.toggle('d-none')
            btnKirim.classList.toggle('d-none')

            myAlert.classList.toggle('d-none')
            form.reset()
        })
      .catch(error => console.error('Error!', error.message))
  })