const options = {
    method: 'GET',
    url: 'https://us-zip-code-information.p.rapidapi.com/',
    params: {zipcode: zip_code},
    headers: {
      'x-rapidapi-host': 'us-zip-code-information.p.rapidapi.com',
      'x-rapidapi-key': '75af0047bbmsh032102303b45a74p195441jsn22d8edb85f85'
    }
  };
  
  axios.request(options).then(function (response) {
      console.log(response.data);
      var res = response.data
  
      res.forEach((element, index, array) => {
          document.getElementById("city").innerHTML = element.City
          document.getElementById("state").innerHTML = element.State
   // 100, 200, 300
  
  });
  }).catch(function (error) {
      console.error(error);
  });
  