document.getElementById('loginButton').addEventListener('click', () => {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === 'user' && password === '1234') {
        document.querySelector('.login-container').classList.add('hidden');
        document.querySelector('.main-container').classList.remove('hidden');
        fetchPlayers();
    } else {
        alert('Username atau password salah!');
    }
});

const nama = document.querySelector(`[data-input="nama"]`);
const umur = document.querySelector(`[data-input="umur"]`);
const negara = document.querySelector(`[data-input="negara"]`);
const club = document.querySelector(`[data-input="club"]`);
const kirim = document.querySelector(`[data-button="kirim"]`);
const batal = document.querySelector(`[data-button="batal"]`);
const playersList = document.getElementById('players');
const h1 = document.querySelector('h1');

// Push data to Firebase when "Kirim" is clicked
kirim.addEventListener('click', () => {
    if (nama.value && umur.value && negara.value && club.value) {
        if (editingPlayerKey) {
            // Update player if we're editing
            firebase.database().ref('pemainBaru').child(editingPlayerKey).update({
                'nama': nama.value,
                'umur': umur.value,
                'negara': negara.value,
                'club': club.value
            }).then(() => {
                console.log('Data berhasil diperbarui');
                resetForm();
                fetchPlayers(); // Refresh player list
            }).catch((error) => {
                console.error('Error memperbarui data:', error);
            });
        } else {
            // Add new player if not editing
            firebase.database().ref('pemainBaru').child(nama.value).set({
                'nama': nama.value,
                'umur': umur.value,
                'negara': negara.value,
                'club': club.value
            }).then(() => {
                console.log('Data berhasil disimpan');
                resetForm();
                fetchPlayers(); // Refresh player list
            }).catch((error) => {
                console.error('Error menyimpan data:', error);
            });
        }
    } else {
        alert("Semua data harus diisi!");
    }
});

// Reset form after submission
function resetForm() {
    nama.value = '';
    umur.value = '';
    negara.value = '';
    club.value = '';
    h1.textContent = 'Daftar Pemain Sepak Bola';
    batal.style.display = 'none';
    editingPlayerKey = null;
}

// Fetch and display players from Firebase with labeled details
function fetchPlayers() {
    firebase.database().ref('pemainBaru').on('value', (snapshot) => {
        playersList.innerHTML = ''; // Clear the list
        snapshot.forEach((childSnapshot) => {
            const player = childSnapshot.val();
            const li = document.createElement('li');
            
            // Display player info with labels
            li.innerHTML = `
                <strong>Nama:</strong> ${player.nama} <br>
                <strong>Umur:</strong> ${player.umur} <br>
                <strong>Negara:</strong> ${player.negara} <br>
                <strong>Club:</strong> ${player.club} <br>
            `;
            
            // Add update and delete buttons with smaller size
            const buttonContainer = document.createElement('div');
            buttonContainer.classList.add('button-container');
            
            const updateButton = document.createElement('button');
            updateButton.textContent = 'Update';
            updateButton.classList.add('small-button');
            updateButton.onclick = () => editPlayer(childSnapshot.key, player);
            
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.classList.add('small-button');
            deleteButton.onclick = () => deletePlayer(childSnapshot.key);

            buttonContainer.appendChild(updateButton);
            buttonContainer.appendChild(deleteButton);
            li.appendChild(buttonContainer);

            playersList.appendChild(li);
        });
    });
}

let editingPlayerKey = null;

        // JavaScript to clear form inputs on Batal button click
        document.getElementById('batalButton').addEventListener('click', function() {
            clearForm();
        });

        // Function to clear the form
        function clearForm() {
            document.getElementById('nama').value = '';
            document.getElementById('umur').value = '';
            document.getElementById('negara').value = '';
            document.getElementById('club').value = '';
            document.getElementById('formTitle').textContent = 'Daftar Pemain Sepak Bola';
            document.getElementById('batalButton').style.display = 'none';
            editingPlayerKey = null; // Reset editing key
        }

        // Edit player in the form
        function editPlayer(playerKey, player) {
            document.getElementById('nama').value = player.nama;
            document.getElementById('umur').value = player.umur;
            document.getElementById('negara').value = player.negara;
            document.getElementById('club').value = player.club;
            document.getElementById('formTitle').textContent = 'Update Daftar Pemain Sepak Bola';
            document.getElementById('batalButton').style.display = 'inline'; 
            editingPlayerKey = playerKey; // Set the key of the player being edited
        }

        // Function to handle the "Kirim" button
        document.getElementById('kirimButton').addEventListener('click', function() {
            const nama = document.getElementById('nama').value;
            const umur = document.getElementById('umur').value;
            const negara = document.getElementById('negara').value;
            const club = document.getElementById('club').value;

            if (editingPlayerKey) {
                console.log('Updating player:', editingPlayerKey, { nama, umur, negara, club });
            } else {
                // Logic to add a new player
                console.log('Adding new player:', { nama, umur, negara, club });
            }

            // Clear the form after submission
            clearForm();
        });

// Delete player from Firebase
function deletePlayer(playerId) {
    if (confirm('Are you sure you want to delete this player?')) {
        firebase.database().ref('pemainBaru').child(playerId).remove()
        .then(() => {
            console.log('Player deleted');
            fetchPlayers();
        }).catch((error) => {
            console.error('Error deleting player:', error);
        });
    }
}

// Initialize the players list
fetchPlayers();