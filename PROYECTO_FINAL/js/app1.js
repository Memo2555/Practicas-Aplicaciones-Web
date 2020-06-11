$(document).ready(function()
{
 
  fetchTasks();   
  
  
    $('#task-form').submit(function(e)
    {
        const postData = {
            name: $('#name').val(),
        };

      $.post('php/agregar-tema.php',postData,function(respuesta)
      {
     fetchTasks();
          $('#task-form').trigger('reset');
          window.location.reload(true);
      });
      e.preventDefault();
    });


    // Fetching Tasks
  function fetchTasks() {
        $.ajax({
          url: 'lista-temas.php',
          type: 'GET',
          success: function(response) {
            const tasks = JSON.parse(response);
            let template = '';
            tasks.forEach(task => {
              template += `
                      <tr>
                          <td>${task.name} </td>
                          <td>${task.id} </td>
                      </tr>
                    `
            });
            $('#tasks').html(template);
          }
        });
    }


});



