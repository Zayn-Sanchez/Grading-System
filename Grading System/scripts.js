document.addEventListener('DOMContentLoaded', () => {
    const gradesForm = document.getElementById('grades-form');
    const results = document.getElementById('results');
  
    function showError(input, message) {
      input.style.borderColor = 'red';
      const error = document.createElement('div');
      error.className = 'error-message';
      error.innerText = message;
      input.parentElement.appendChild(error);
    }
  
    function clearError(input) {
      input.style.borderColor = '';
      const error = input.parentElement.querySelector('.error-message');
      if (error) {
        error.remove();
      }
    }
  
    gradesForm.addEventListener('submit', (e) => {
      e.preventDefault();
  
      const modules = [
        { id: 'comp7001', name: 'Object-Oriented Programming', credits: 20 },
        { id: 'comp7002', name: 'Modern Computer Systems', credits: 20 },
        { id: 'tech7005', name: 'Research, Scholarship and Professional Skills', credits: 20 },
        { id: 'dalt7002', name: 'Data Science Foundations', credits: 10 },
        { id: 'dalt7011', name: 'Introduction to Machine Learning', credits: 10 },
        { id: 'soft7003', name: 'Advanced Software Development', credits: 20 },
        { id: 'tech7004', name: 'Cyber Security and the Web', credits: 20 },
        { id: 'tech7009', name: 'MSc Dissertation in Computing Subjects', credits: 60 },
      ];
  
      let validInput = true;
  
      //Clear previous error messages
      for (const module of modules) {
        clearError(document.getElementById(`${module.id}-marks`));
      }
  
      //Validate input marks and display an error message if invalid
      for (const module of modules) {
        const marks = parseInt(document.getElementById(`${module.id}-marks`).value);
        if (isNaN(marks) || marks < 0 || marks > 100) {
          showError(document.getElementById(`${module.id}-marks`), 'Please enter a valid mark between 0 and 100.');
          validInput = false;
        }
      }
  
      if (!validInput) return;
  
      let gradeCounts = { A: 0, B: 0, C: 0, F: 0 };
      let totalMarks = 0;
      let totalCredits = 0;
  
      for (const module of modules) {
        const marks = parseInt(document.getElementById(`${module.id}-marks`).value);
        let grade;
        if (marks >= 70) grade = 'A';
        else if (marks >= 60) grade = 'B';
        else if (marks >= 50) grade = 'C';
        else grade = 'F';
  
        gradeCounts[grade]++;
        totalMarks += marks;
  
        if (grade !== 'F') {
          totalCredits += module.credits;
        }
      }
  
      //Calculate average marks
      let avgMarks = totalMarks / modules.length;
  
      //Determine qualification
      let qualification;
      if (totalCredits >= 180) qualification = 'MSc in Computing Science';
      else if (totalCredits >= 120) qualification = 'PG Diploma in Computing';
  
      //Determine MSc classification
      let mscClassification;
      if (avgMarks >= 70 && parseInt(document.getElementById('tech7009-marks').value) >= 68) {
        mscClassification = 'Distinction';
      } else if (avgMarks >= 60 && parseInt(document.getElementById('tech7009-marks').value) >= 58) {
        mscClassification = 'Merit';  
  }
  
      results.innerHTML = `
        <h2>Grades</h2>
        <ul>
          ${Object.entries(gradeCounts).map(([grade, count]) => `<li>${grade}: ${count}</li>`).join('')}
        </ul>
        <h2>Credits Earned</h2>
        <p>${totalCredits}</p>
        <h2>Recommended Qualification</h2>
        <p>${qualification ? qualification : 'None'}</p>
        <h2>Average Marks</h2>
        <p>${avgMarks.toFixed(2)}</p>
        ${qualification === 'MSc in Computing Science' ? `<h2>MSc Classification</h2><p>${mscClassification}</p>` : ''}
      `;
      results.classList.remove('hidden');
    });
  });