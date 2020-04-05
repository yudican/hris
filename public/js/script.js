function handleRequest(url, data, token, method='POST') {
  return fetch(url, {
    credentials: 'same-origin', // 'include', default: 'omit'
    method: method, // 'GET', 'PUT', 'DELETE', etc.
    body: JSON.stringify(data), // Coordinate the body type with 'Content-Type'
    headers: new Headers({
      'Content-Type': 'application/json',
      "X-CSRF-TOKEN": token
    }),
  })
  .then(response => response.json())
}

function getRequest(url, token, method='GET') {
  return fetch(url, {
    credentials: 'same-origin', // 'include', default: 'omit'
    method: method, // 'GET', 'PUT', 'DELETE', etc.
    headers: new Headers({
      'Content-Type': 'application/json',
      "X-CSRF-TOKEN": token
    }),
  })
  .then(response => response.json())
}

function serialize(data) {
  return data.map(function(x){this[x.name] = x.value; return this;}.bind({}))[0]
}

function notif(msg, title='Success', type='success'){
  let content = {
    message: msg,
    title,
    icon: 'fa fa-check'
  }
  $.notify(content,{
    type,
    placement: {
      from: 'top',
      align: 'right'
    },
    timer: 1000,
    delay: 3000,
  });
}