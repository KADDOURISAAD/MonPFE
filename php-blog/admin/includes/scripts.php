<script src="js/bootstrap.bundle.min.js" ></script>
        
        <script src="js/jquery-3.7.1.js"></script>
        <script src="js/dataTables.bootstrap5.js" ></script>
        <script src="js/dataTables.js" ></script>
<script>
        new DataTable('#example');
        // Récupérer les éléments de sélection
var fieldSelect = document.getElementById('field_name');
var groupSelect = document.getElementById('group_name');

// Écouter les changements dans la sélection du champ
fieldSelect.addEventListener('change', function() {
    // Effacer les options précédentes dans la liste déroulante des groupes
    groupSelect.innerHTML = '<option value="">Select Group</option>';
    
    // Récupérer la valeur sélectionnée du champ
    var selectedField = this.value;

    // Si aucun champ n'est sélectionné, quitter la fonction
    if (!selectedField) return;

    // Effectuer une requête AJAX pour récupérer les groupes correspondant au champ sélectionné
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_groups.php?field=' + encodeURIComponent(selectedField), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Mettre à jour la liste déroulante des groupes avec les données reçues
                var groups = JSON.parse(xhr.responseText);
                groups.forEach(function(group) {
                    var option = document.createElement('option');
                    option.value = group;
                    option.textContent = group;
                    groupSelect.appendChild(option);
                });
            } else {
                console.error('Error fetching groups:', xhr.statusText);
            }
        }
    };
    xhr.send();
});
// lessons by semseter

var fieldSelect2 = document.getElementById('semester');
var lessonSelect = document.getElementById('lesson');
fieldSelect2.addEventListener('change', function() {
    // Effacer les options précédentes dans la liste déroulante des groupes
    lessonSelect.innerHTML = '<option value="">Select Lesson</option>';
    
    // Récupérer la valeur sélectionnée du champ
    var selectedField = this.value;

    // Si aucun champ n'est sélectionné, quitter la fonction
    if (!selectedField) return;

    // Effectuer une requête AJAX pour récupérer les groupes correspondant au champ sélectionné
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_semester.php?semester=' + encodeURIComponent(selectedField), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Mettre à jour la liste déroulante des groupes avec les données reçues
                var lessons = JSON.parse(xhr.responseText);
                lessons.forEach(function(lesson) {
                    var option = document.createElement('option');
                    option.value = lesson;
                    option.textContent = lesson;
                    lessonSelect.appendChild(option);
                });
            } else {
                console.error('Error fetching lessons:', xhr.statusText);
            }
        }
    };
    xhr.send();
});



// document.getElementById('field_name').addEventListener('change', function() {
//         var selectedOption = this.options[this.selectedIndex];
//         if (selectedOption) {
//             // Redirect to generate-new.php with the selected field value
//             window.location.href = 'generate-new.php?field=' + selectedOption.getAttribute('data-value');
//         }
//     });
    //

    
    // Function to handle the redirection
    // function redirectToAnotherPage() {
    //     // Get the selected values from both select elements
    //     var fieldName = document.getElementById("field_name").value;
    //     var semester = document.getElementById("semester").value;

    //     // Construct the URL with the selected values
    //     var url = "generate-new.php?field=" + encodeURIComponent(fieldName) + "&semester=" + encodeURIComponent(semester);

    //     // Redirect the user to the constructed URL
    //     window.location.href = url;
    // }

    // // Add event listeners to both select elements to trigger redirection when selections change
    // document.getElementById("field_name").addEventListener("change", redirectToAnotherPage);
    // document.getElementById("semester").addEventListener("change", redirectToAnotherPage);


// 

    
// var selectedField__ = '';
// var selectedSemester__ = '';

// document.getElementById('field_name').addEventListener('change', function() {
//     var selectedOption = this.options[this.selectedIndex];
//     selectedField__ = selectedOption ? selectedOption.getAttribute('data-value') : '';

//     redirectToGeneratePage();
// });

// document.getElementById('semester').addEventListener('change', function() {
//     var selectedOption = this.options[this.selectedIndex];
//     selectedSemester__ = selectedOption ? selectedOption.getAttribute('data-value') : '';

//     redirectToGeneratePage();
// });

// function redirectToGeneratePage() {
//     if (selectedField__ && selectedSemester__) {
//         // Redirect to generate-new.php with both field and semester values
//         window.location.href = 'generate-new.php?field=' + selectedField + '&semester=' + selectedSemester;
//     }
// }

function redirectToAnotherPage(fieldId, semesterId, page) {
    // Get the selected values from both select elements
    var fieldName = document.getElementById(fieldId).value;
    var semester = document.getElementById(semesterId).value;

    // Construct the URL with the selected values based on the page parameter
    var url;
    if (page === "generate") {
        url = "generate-new.php?field=" + encodeURIComponent(fieldName) + "&semester=" + encodeURIComponent(semester);
    } else if (page === "view") {
        url = "view-course.php?field=" + encodeURIComponent(fieldName) + "&semester=" + encodeURIComponent(semester);
    }

    // Redirect the user to the constructed URL
    window.location.href = url;
}

// Add event listeners to the first set of select elements
document.getElementById("field_name").addEventListener("change", function() {
    redirectToAnotherPage("field_name", "semester", "generate");
});
document.getElementById("semester").addEventListener("change", function() {
    redirectToAnotherPage("field_name", "semester", "generate");
});

// Add event listeners to the second set of select elements
document.getElementById("field_name_module").addEventListener("change", function() {
    redirectToAnotherPage("field_name_module", "semester_module", "view");
});
document.getElementById("semester_module").addEventListener("change", function() {
    redirectToAnotherPage("field_name_module", "semester_module", "view");
});


        </script>
        <!--  -->
       
        
        <script src="js/scripts.js"></script>   

        </body>
</html>
