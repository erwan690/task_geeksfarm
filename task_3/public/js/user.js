$(document).ready(function() {

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  function ajax(options) {
      return new Promise(function (resolve, reject) {
        $.ajax(options).done(resolve).fail(reject);
      });
      }
			// handlers
			function onGetClick(event)
			{
				// we're not passing any data with the get route, though you can if you want
          $.getJSON('user/'+$(this).attr('value')+'/edit',onSuccess);
			}
			function onPostClick(event)
			{
				// we're passing data with the post route, as this is more normal
				$.post('/ajax/post', {payload:'hello'}, onSuccess);
			}
			function onSuccess(data, status, xhr)
			{
				// with our success handler, we're just logging the data...
				$('#myModal').modal('show');
        $('.modal-title').html('Edit User');
        $('.name-model').val(data.name);
        $('.email-model').val(data.email).prop('readonly', true);
        $('#passwordna').remove();
        $('#resetna').remove();
        $('#the-return').html(data.name);
				console.log(data, status, xhr);

				// but you can do something with it if you like - the JSON is deserialised into an object
				console.log(String(data.value).toUpperCase())
			}
			// listeners
			$('button#get').on('click', onGetClick);
			$('button#post').on('click', onPostClick);
      $('button#search-tablena').on('click', function() {
        ajax({
          url : '/user',
          type : 'GET',
          dataType : 'json',
          data : {
            'keyword' : $('#search-query').val(),
            },
            success : function(data) {
            console.log(data);
            },
            error : function(xhr, status) {
            console.log(xhr.error + " ERROR STATUS : " + status);
            },
            complete : function() {
            alreadyloading = false;
            }
            });

          });

            });
