"use strict";
window.onload = function(){
    
    var btn = document.getElementById('lookup');
    var city = document.getElementById('cities');
    var search = document.getElementById('country');
    var url = 'http://localhost/info2180-lab5/world.php?country=';
    var result = document.getElementById('result');

    
    btn.addEventListener('click',function(event){
        event.preventDefault();
        let query_element =  search.value;
        let request = new URL(url+query_element+'&context=') ;
        fetch (request)
            .then(response => {
                if (response.ok){
                    return response.text()
                } 
                else{
                    return Promise.reject('something went wrong')
                }
        })
            .then (function(data){
            result.innerHTML = data;
        })
            .catch (error => console.log('There was an error: ' + error))
    
})

    city.addEventListener('click',function(event){
        event.preventDefault();
        let query_element = search.value;
        let request = new URL(url + query_element + '&context=cities');
        fetch (request)
            .then(response => {
                if (response.ok){
                    return response.text()
                } 
                else{
                    return Promise.reject('something went wrong')
                }
        })
            .then (function(data){
            result.innerHTML = data;
        })
            .catch (error => console.log('There was an error: ' + error))
    })


    }

