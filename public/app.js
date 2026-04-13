const todo_list=document.getElementById("col-todo");
const doing_list=document.getElementById("col-doing");
const done_list=document.getElementById("col-done");

function load_tasks(){
    todo_list.innerHTML="Loading...";
    doing_list.innerHTML="Loading...";
    done_list.innerHTML="Loading";

    fetch("/api/tasks.php")
    .then(response=>response.json())
    .then(tasks=>{
        todo_list.innerHTML="";
        doing_list.innerHTML="";
        done_list.innerHTML="";

        tasks.forEach((task)=>{
            let buttonsHTML = `<div class="card-actions" style="margin-top: 10px; display: flex; gap: 5px; font-size: 12px;">`;
            
            if(task.status==='todo'){
                buttonsHTML+=`<button onclick="update_task_status(${task.id}, 'doing')">Move Right ➔</button>`;
            }else if (task.status==='doing'){
                buttonsHTML+=`<button onclick="update_task_status(${task.id}, 'todo')">⬅ Move Left</button>`;
                buttonsHTML+=`<button onclick="update_task_status(${task.id}, 'done')">Move Right ➔</button>`;
            }else if (task.status==='done'){
                buttonsHTML += `<button onclick="update_task_status(${task.id}, 'doing')">⬅ Move Left</button>`;
            }

            // Everyone gets a delete button!
            buttonsHTML += `<button onclick="delete_task(${task.id})" style="color: red;">Delete</button>`;
            buttonsHTML += `</div>`;

            const cardHTML = `s
            <div class="card">
                <div class="title">${task.label}</div>
                <div class="desc">${task.description}</div>
                ${buttonsHTML}
            </div>
            `;

            // 4. Place it in the right column
            if (task.status === 'todo') {
                todo_list.innerHTML += cardHTML;
            } else if (task.status === 'doing') {
                doing_list.innerHTML += cardHTML;
            } else if (task.status === 'done') {
                done_list.innerHTML += cardHTML;
            }
        });
    }).catch(error=>{
        console.error("Failed to load tasks",error);
        board.innerHTML="Error Loading Tasks.";
    });
}

load_tasks();

function update_task_status(task_id,status){
    //we send a raw post request 
    fetch("/api/update_status.php",{
        method:"POST",
        headers: {"Content-type":'application/x-www-form-urlencoded'},
        body: `id=${task_id}&status=${status}`
    })
    .then(response=>response.json())
    .then(data=>{
        if (data.success){
            load_tasks();
        }
    });
};

function delete_task(task_id){
    if(confirm("Are you sure you want to delete this task?")){
        fetch('/api/delete_task.php',{
           method:"POST",
           headers:{"Content-Type":"application/x-www-form-urlencoded"},
           body: `id=${task_id}`
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                load_tasks(); 
            }
        });
    }   

};