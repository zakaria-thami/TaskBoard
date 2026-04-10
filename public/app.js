const board= document.getElementById('card_board');

board.innerHTML= 'Loading tasks...';

fetch("/api/tasks.php")
    .then(response => response.json())
    .then(tasks =>{
       board.innerHTML='';
       
       //loop
       tasks.forEach((task) => {
        const cardHTML=`
        <div class="card">
            <div class="title">${task.label}</div>
            <div class="desc">${task.desc}</div>
        </div>
        `;
        board.innerHTML += cardHTML;
       });
    })
    .catch(error=>{
        console.error("Failed to load tasks",error);
        board.innerHTML="Error Loading Tasks.";
    })