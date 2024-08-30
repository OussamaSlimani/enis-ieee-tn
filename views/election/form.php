<?php
require "views/home/components/header.php";
?>

<!-- ==========  banner End ========== -->
<div class="container-fluid bg-dark mb-5 border-bottom" style="padding-top: 80px">
  <div class="d-flex justify-content-between align-items-center pt-5 px-2 wow bounceInDown">
    <div class="border-start-4 px-4 py-4 m-4 d-flex flex-column justify-content-center">
      <h2 class="display-5 m-2 text-white">IEEE ENIS SB ELECTION</h2>
      <h4 class="text-white m-2 pt-2">
        Your chance to be a part of our community!
      </h4>
    </div>
    <div class="headerIcon">
      <img src="assets/img/icons/a-16.png" style="height: 280px; padding: 12px" alt="image" />
    </div>
  </div>
</div>
<!-- ==========  banner End ========== -->

<!-- ========== Enhanced Candidates Start ========== -->
<div class="container-xxl shadow rounded-4 border candidate-container bg-white-mode wow fadeIn" data-wow-delay="0.2s">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="text-primary fw-bold">IEEE ENIS SB Candidate Form</h2>
    </div>
    <form>
      <div class="row g-4">
        <!-- Full Name Field -->
        <div class="col-md-6">
          <label for="fullName" class="form-label fw-medium text-dark text-dark">Full Name</label>
          <input type="text" id="fullName" class="form-control border border-primary bg-light px-4 py-2 rounded-3" value="Full Name" readonly />
        </div>
        <!-- Department Field -->
        <div class="col-md-6">
          <label for="department" class="form-label fw-medium text-dark">Department</label>
          <input type="text" id="department" class="form-control border border-primary bg-light px-4 py-2 rounded-3" value="Computer Engineering" readonly />
        </div>
        <!-- Chapter Field -->
        <div class="col-md-6">
          <label for="chapter" class="form-label fw-medium text-dark">Chapter</label>
          <select id="chapter" name="Chapter" class="form-select border border-primary bg-light px-4 py-2 rounded-3">
            <option value="SB">SB</option>
            <option value="CS">CS</option>
            <option value="IAS">IAS</option>
            <option value="CIS">CIS</option>
            <option value="WIE">WIE</option>
            <option value="RAS">RAS</option>
            <option value="SSCS">SSCS</option>
            <option value="EMBS">EMBS</option>
            <option value="Cyber">CYBER</option>
            <option value="AESS">AESS</option>
            <option value="PES">PES</option>
            <option value="Sight">SIGHT</option>
            <option value="CASS">CASS</option>
          </select>
        </div>
        <!-- Position Field -->
        <div class="col-md-6">
          <label for="position1" class="form-label fw-medium text-dark">Position</label>
          <select id="position1" name="Position" class="form-select border border-primary bg-light px-4 py-2 rounded-3">
          </select>
        </div>
        <!-- About Yourself Field -->
        <div class="col-12">
          <label for="about" class="form-label fw-medium text-dark">About Yourself</label>
          <textarea id="about" class="form-control border border-primary bg-light px-4 py-3 rounded-3" rows="3" placeholder="Tell us about yourself" maxlength="300" oninput="updateCharCount('about', 300)"></textarea>
          <small id="aboutCharCount" class="form-text text-muted">300 characters remaining</small>
        </div>
        <!-- What You Have Learned Field -->
        <div class="col-12">
          <label for="learned" class="form-label fw-medium text-dark">What You Have Learned from IEEE So Far</label>
          <textarea id="learned" class="form-control border border-primary bg-light px-4 py-3 rounded-3" rows="3" placeholder="Share your learning experiences" maxlength="400" oninput="updateCharCount('learned', 400)"></textarea>
          <small id="learnedCharCount" class="form-text text-muted">400 characters remaining</small>
        </div>
        <!-- What You Hope to Achieve Field -->
        <div class="col-12">
          <label for="achieve" class="form-label fw-medium text-dark">What You Hope to Achieve by Being Involved with IEEE</label>
          <textarea id="achieve" class="form-control border border-primary bg-light px-4 py-3 rounded-3" rows="4" placeholder="Describe your goals" maxlength="500" oninput="updateCharCount('achieve', 500)"></textarea>
          <small id="achieveCharCount" class="form-text text-muted">500 characters remaining</small>
        </div>
        <!-- Image Upload Field -->
        <div class="col-md-6">
          <label for="imageUpload" class="form-label fw-medium text-dark">Upload Your Image</label>
          <input type="file" id="imageUpload" class="form-control border border-primary px-4 py-2 rounded-3" accept="image/*" />
        </div>
        <!-- Submit Button -->
        <div class="col-md-6 align-self-end">
          <button class="btn btn-primary w-100 py-2 rounded-3 fw-bold" type="submit">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- ========== Enhanced Candidates End ========== -->




<script>
  // count words
  function updateCharCount(id, maxLength) {
    const textarea = document.getElementById(id);
    const charCountElement = document.getElementById(id + 'CharCount');
    const remainingChars = maxLength - textarea.value.length;
    charCountElement.textContent = remainingChars + " characters remaining";
  }

  // positions
  const sbPositions = ["Chair", "Vice Chair", "Treasurer", "Secretary", "Webmaster", "Human Resources", "Media Manager"];
  const otherPositions = ["Chair", "Vice Chair", "Treasurer", "Secretary", "Webmaster"];
  document.getElementById('chapter').addEventListener('change', function() {
    const selectedChapter = this.value;
    const positionSelect = document.getElementById('position1');
    positionSelect.innerHTML = '';
    const positions = (selectedChapter === 'SB') ? sbPositions : otherPositions;
    positions.forEach(position => {
      const option = document.createElement('option');
      option.value = position;
      option.text = position;
      positionSelect.appendChild(option);
    });
  });
  document.getElementById('chapter').dispatchEvent(new Event('change'));
</script>

<?php
require "views/home/components/footer.php";
?>