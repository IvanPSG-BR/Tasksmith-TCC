document.addEventListener('DOMContentLoaded', () => {
    const manager = document.getElementById('manager');
    if (!manager) return;

    // Modal elements
    const editTaskModal = document.getElementById('editTaskModal');
    const editTaskForm = document.getElementById('editTaskForm');
    const closeButton = editTaskModal.querySelector('.close-button');
    const editTaskId = document.getElementById('editTaskId');
    const editTaskName = document.getElementById('editTaskName');
    const editTaskDescription = document.getElementById('editTaskDescription');

    const columns = {
        to_do: document.querySelector('.to-do'),
        in_progress: document.getElementById('in_progress'),
        finished: document.querySelector('.done')
    };

    const getTaskStatus = (taskElement) => {
        if (taskElement.closest('.to-do')) return 'to_do';
        if (taskElement.closest('#in_progress')) return 'in_progress';
        if (taskElement.closest('.done')) return 'finished';
        return null;
    };
    
    const openEditModal = (taskElement) => {
        const taskId = taskElement.dataset.taskId;
        const taskName = taskElement.querySelector('.task_name').textContent;
        const taskDescription = taskElement.querySelector('.description p').textContent;

        editTaskId.value = taskId;
        editTaskName.value = taskName;
        editTaskDescription.value = taskDescription.trim();
        
        editTaskModal.classList.remove('hidden');
    };

    const closeEditModal = () => {
        editTaskModal.classList.add('hidden');
    };

    closeButton.addEventListener('click', closeEditModal);
    window.addEventListener('click', (event) => {
        if (event.target == editTaskModal) {
            closeEditModal();
        }
    });

    editTaskForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        const taskId = editTaskId.value;
        const taskName = editTaskName.value;
        const taskDescription = editTaskDescription.value;

        await updateTask(taskId, taskName, taskDescription);
    });

    const updateTask = async (taskId, taskName, taskDescription) => {
        try {
            const response = await fetch('/game/task-board', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ taskId, taskName, taskDescription })
            });

            if (!response.ok) {
                throw new Error('Failed to update task');
            }

            const result = await response.json();
            if (result && result.success) {
                const taskElement = manager.querySelector(`.task[data-task-id="${taskId}"]`);
                taskElement.querySelector('.task_name').textContent = taskName;
                taskElement.querySelector('.description p').textContent = taskDescription;
                closeEditModal();
            } else {
                alert('Failed to update task. Please try again.');
            }
        } catch (error) {
            console.error('Error updating task:', error);
        }
    };


    const updateTaskStatus = async (taskId, newStatus) => {
        try {
            const response = await fetch('/game/task-board', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ taskId, newStatus })
            });

            if (!response.ok) {
                throw new Error('Failed to update task status');
            }

            return await response.json();
        } catch (error) {
            console.error('Error updating task:', error);
            return null;
        }
    };

    const deleteTask = async (taskId) => {
        if (!confirm('Tem certeza que deseja excluir esta missão?')) {
            return;
        }

        try {
            const response = await fetch('/game/task-board', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ taskId })
            });

            if (!response.ok) {
                throw new Error('Failed to delete task');
            }

            const result = await response.json();
            
            if (result && result.success) {
                const taskElement = manager.querySelector(`.task[data-task-id="${taskId}"]`);
                if (taskElement) {
                    taskElement.remove();
                }
            } else {
                alert('Não foi possível excluir a missão. Tente novamente.');
            }

        } catch (error) {
            console.error('Error deleting task:', error);
        }
    };
    
    const moveTask = async (taskElement, direction) => {
        const taskId = taskElement.dataset.taskId;
        const currentStatus = getTaskStatus(taskElement);
        let newStatus;

        if (direction === 'right') {
            newStatus = (currentStatus === 'to_do') ? 'in_progress' : 'finished';
        } else if (direction === 'left') {
            newStatus = (currentStatus === 'in_progress') ? 'to_do' : null;
        }

        if (!newStatus) return;

        const result = await updateTaskStatus(taskId, newStatus);

        if (result && result.success) {
            columns[newStatus].appendChild(taskElement);
            updateTaskUI(taskElement, newStatus);
            if (newStatus === 'finished' && result.character) {
                updateCharacterUI(result.character);
            }
        }
    };

    const updateTaskUI = (taskElement, newStatus) => {
        const leftArrow = taskElement.querySelector('.left_arrow');
        const rightArrow = taskElement.querySelector('.right_arrow');
        const editBtn = taskElement.querySelector('.edit_btn');
        const deleteBtn = taskElement.querySelector('.delete_btn');
        const checkIcon = taskElement.querySelector('.fa-check');

        // Reset all to hidden, checking for nulls
        [leftArrow, rightArrow, editBtn, checkIcon, deleteBtn].forEach(el => {
            if (el) el.classList.add('hidden');
        });

        if (newStatus === 'to_do') {
            rightArrow.classList.remove('hidden');
            editBtn.classList.remove('hidden');
            deleteBtn.classList.remove('hidden');
        } else if (newStatus === 'in_progress') {
            leftArrow.classList.remove('hidden');
            rightArrow.classList.remove('hidden');
            editBtn.classList.remove('hidden');
            deleteBtn.classList.remove('hidden');
        } else if (newStatus === 'finished') {
            if (checkIcon) checkIcon.classList.remove('hidden');
            deleteBtn.classList.remove('hidden');
        }
    };

    // Set initial UI state for all tasks on page load
    const allTasks = document.querySelectorAll('.task');
    allTasks.forEach(task => {
        const status = getTaskStatus(task);
        if (status) {
            updateTaskUI(task, status);
        }
    });

    manager.addEventListener('click', (event) => {
        const target = event.target;
        const taskElement = target.closest('.task');
        if (!taskElement) return;

        const taskId = taskElement.dataset.taskId;

        if (target.closest('.left_btn')) {
            moveTask(taskElement, 'left');
        }

        if (target.closest('.right_btn')) {
            moveTask(taskElement, 'right');
        }

        if (target.closest('.edit_btn')) {
            openEditModal(taskElement);
        }

        if (target.closest('.delete_btn')) {
            deleteTask(taskId);
        }
    });
    const updateCharacterUI = (characterData) => {
        const characterHpElement = document.getElementById('character_hp');
        const characterXpBarElement = document.getElementById('character_xp_bar');
        const characterXpTextElement = document.getElementById('character_xp_text');
        const characterGoldAmountElement = document.getElementById('character_gold_amount');
        const characterImageElement = document.getElementById('character_image');

        // Update HP
        if (characterHpElement) {
            const heartIcons = characterHpElement.querySelectorAll('.fa-heart');
            heartIcons.forEach((icon, index) => {
                if (index < characterData.hp) {
                    icon.classList.remove('text-gray-400');
                    icon.classList.add('text-red-700');
                } else {
                    icon.classList.remove('text-red-700');
                    icon.classList.add('text-gray-400');
                }
            });
        }

        // Update XP
        if (characterXpBarElement && characterXpTextElement) {
            const xpNeededForLevelUp = 100 + (parseInt(characterData.level, 10) - 1) * 50;
            characterXpBarElement.value = characterData.xp;
            characterXpBarElement.max = xpNeededForLevelUp;
            characterXpTextElement.textContent = `${characterData.xp} / ${xpNeededForLevelUp} XP`;
        }

        // Update Gold
        if (characterGoldAmountElement) {
            characterGoldAmountElement.textContent = characterData.gold_amount;
        }

        // Update Character Image based on level
        if (characterImageElement) {
            // A imagem base é algo como '.../images/character-1.png'
            // Precisamos extrair a parte antes do número e do .png
            const currentSrc = characterImageElement.src;
            const newSrc = currentSrc.replace(/character-\d+\.png$/, `character-${characterData.level}.png`);
            characterImageElement.src = newSrc;
        }
    };
});
