const TOKEN = document.querySelector('meta[name="csrf-token"]')

Get = (url) => {
  return fetch(url, {
    credentials: 'same-origin', // 'include', default: 'omit'
    method: 'GET', // 'GET', 'PUT', 'DELETE', etc.
    headers: new Headers({
      'Content-Type': 'application/json',
      "X-CSRF-TOKEN": TOKEN
    }),
  })
  .then(response => response.json())
}

Post = (url, data) => {
  return fetch(url, {
    credentials: 'same-origin', // 'include', default: 'omit'
    method: 'POST', // 'GET', 'PUT', 'DELETE', etc.
    body: JSON.stringify(data), // Coordinate the body type with 'Content-Type'
    headers: new Headers({
      'Content-Type': 'application/json',
      "X-CSRF-TOKEN": TOKEN
    }),
  })
  .then(response => response.json())
}

Put = (url, data) => {
  return fetch(url, {
    credentials: 'same-origin', // 'include', default: 'omit'
    method: 'Put', // 'GET', 'PUT', 'DELETE', etc.
    body: JSON.stringify(data), // Coordinate the body type with 'Content-Type'
    headers: new Headers({
      'Content-Type': 'application/json',
      "X-CSRF-TOKEN": TOKEN
    }),
  })
  .then(response => response.json())
}

Delete = (url) => {
  return fetch(url, {
    credentials: 'same-origin', // 'include', default: 'omit'
    method: 'DELETE', // 'GET', 'PUT', 'DELETE', etc.
    headers: new Headers({
      'Content-Type': 'application/json',
      "X-CSRF-TOKEN": TOKEN
    }),
  })
  .then(response => response.json())
}