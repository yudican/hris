const tbody = document.querySelector('tbody')
const btnAdd = document.getElementById('btn-add')
var btnEdit = document.getElementById('btn-edit')
const btnDelete = document.getElementById('btn-delete')
const btnSave = document.getElementById('btn-save')
const btnHapus = document.getElementById('btn-hapus')
let actionUrl = ''

tbody.addEventListener('click', function (e) {
  if (!e.target.matches('#btn-edit')) {
    return
  }
  e.preventDefault()
  actionUrl = e.target.getAttribute('data-action')
  let id = e.target.getAttribute('data-id')
  let url = e.target.getAttribute('data-url')
  // $('#modal-title').text('Edit Kategori')
  this.setAttribute('disabled', 'disabled')

  Get(url)
    .then(res => {
      $(this).removeAttr('disabled')
      const { category_name } = res.data[0]
      $('#categoryModal').modal('show')
      document.querySelector('input[name="category_modal"]').value = category_name
    })
}, false)

