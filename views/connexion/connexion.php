<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Optima CBS | Connexion Sécurisée</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <style>
    :root {
      --primary: #0056b3;
      --danger: #d9534f;
    }
   
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      background-image: url('bg-pattern.png');
      background-size: cover;
    }
   
    .login-container {
      max-width: 450px;
      margin: 5% auto;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
   
    .login-header {
      background-color: var(--primary);
      color: white;
      padding: 20px;
      text-align: center;
    }
   
    .login-body {
      background-color: white;
      padding: 30px;
    }
   
    .form-control {
      border-radius: 5px;
      padding: 12px 15px;
    }
   
    .btn-login {
      background-color: var(--primary);
      color: white;
      border: none;
      padding: 12px;
      font-weight: 600;
      border-radius: 5px;
      width: 100%;
    }
   
    .security-badge {
      font-size: 0.8rem;
      color: #6c757d;
      text-align: center;
      margin-top: 20px;
    }
   
    .mfa-badge {
      background-color: #e9f7fe;
      color: var(--primary);
      padding: 8px 15px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
   
    .alert-compliance {
      background-color: #f8f9fa;
      border-left: 4px solid var(--primary);
      font-size: 0.85rem;
    }
   
    .mfa-input-container {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin: 20px 0;
    }
   
    .mfa-input {
      width: 50px;
      height: 50px;
      text-align: center;
      font-size: 1.5rem;
      border: 2px solid #dee2e6;
      border-radius: 5px;
    }
   
    .mfa-input:focus {
      border-color: var(--primary);
      outline: none;
      box-shadow: 0 0 0 0.25rem rgba(0, 86, 179, 0.25);
    }
   
    .modal-header {
      border-bottom: none;
    }
   
    .modal-footer {
      border-top: none;
      justify-content: center;
    }
   
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20%, 60% { transform: translateX(-5px); }
      40%, 80% { transform: translateX(5px); }
    }
   
    .shake {
      animation: shake 0.5s;
      border-color: var(--danger) !important;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-container">
      <div class="login-header">
        <img src="<?php echo htmlspecialchars(dirname($_SERVER['PHP_SELF']) . '/assets/logo.png'); ?>" alt="Logo BCEAO" height="40" class="mb-2">
        <h4 class="mb-0">Optima CBS</h4>
        <small>Système Bancaire Central certifié UEMOA</small>
      </div>
     
      <div class="login-body">
        <div class="alert alert-compliance mb-4">
          <i class="bi bi-shield-lock me-2"></i>
          Système conforme aux exigences BCEAO (Instruction n°009-06-2015)
        </div>
       
        <?php if ($error): ?>
          <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
          <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
       
        <form id="loginForm" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Identifiant agréé</label>
            <input type="text" class="form-control" id="username" name="username"
                   placeholder="Votre identifiant BCEAO" required
                   pattern="[A-Za-z0-9]{6,}"
                   title="Format : 6 caractères alphanumériques minimum">
          </div>
         
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password"
                   minlength="8" required
                   placeholder="••••••••">
            <div class="form-text">Minimum 8 caractères avec majuscule, chiffre et symbole</div>
          </div>
         
          <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-login" id="submitLogin">
              <i class="bi bi-lock-fill"></i> Connexion sécurisée
            </button>
          </div>
         
          <div class="text-center mb-3">
            <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
          </div>
        </form>
       
        <div class="security-badge">
          <i class="bi bi-patch-check-fill text-success"></i>
          Système certifié conforme aux normes:
          <div class="mt-1">
            <span class="badge bg-light text-dark me-1">SIGFI</span>
            <span class="badge bg-light text-dark me-1">2051-2053</span>
            <span class="badge bg-light text-dark">STAR-UEMOA</span>
          </div>
        </div>
      </div>
    </div>
   
    <div class="text-center mt-4 text-muted">
      <small>
        © 2023 Optima CBS - Conforme aux directives BCEAO
        <span class="mx-2">|</span>
        <a href="#" class="text-decoration-none">Politique de sécurité</a>
        <span class="mx-2">|</span>
        <a href="#" class="text-decoration-none">Audit RGPD</a>
      </small>
    </div>
  </div>
  <div class="modal fade" id="mfaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100">Authentification à deux facteurs</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <p>Un code de vérification à 6 chiffres a été envoyé à votre adresse email enregistrée</p>
          <form id="mfaForm" method="POST">
            <div class="mfa-input-container" id="mfaInputs">
              <!-- Les inputs seront générés par JavaScript -->
            </div>
            <input type="hidden" name="mfa_code" id="mfaCode">
          </form>
          <p class="text-muted small">Code valable pendant 5 minutes</p>
          <div id="mfaError" class="text-danger mb-3" style="display: none;">
            <i class="bi bi-exclamation-circle"></i> Code incorrect ou expiré, veuillez réessayer
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" id="resendCode">
            <i class="bi bi-arrow-clockwise"></i> Renvoyer le code
          </button>
          <button type="button" class="btn btn-primary" id="verifyMfa">Vérifier</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mfaModal = new bootstrap.Modal(document.getElementById('mfaModal'), { backdrop: 'static', keyboard: false });
      const loginForm = document.getElementById('loginForm');
      const mfaForm = document.getElementById('mfaForm');
      const submitBtn = document.getElementById('submitLogin');
      const verifyBtn = document.getElementById('verifyMfa');
      const resendBtn = document.getElementById('resendCode');
      const mfaInputsContainer = document.getElementById('mfaInputs');
      const mfaError = document.getElementById('mfaError');
      const mfaCodeInput = document.getElementById('mfaCode');

      <?php if ($showMfaModal): ?>
        generateMfaInputs();
        mfaModal.show();
      <?php endif; ?>

      function generateMfaInputs() {
        mfaInputsContainer.innerHTML = '';
        for (let i = 0; i < 6; i++) {
          const input = document.createElement('input');
          input.type = 'text';
          input.maxLength = 1;
          input.className = 'mfa-input form-control';
          input.dataset.index = i;
          input.addEventListener('input', handleMfaInput);
          input.addEventListener('keydown', handleMfaBackspace);
          input.addEventListener('paste', handleMfaPaste);
          mfaInputsContainer.appendChild(input);
        }
        mfaInputsContainer.firstChild.focus();
      }

      function handleMfaInput(e) {
        const input = e.target;
        const nextIndex = parseInt(input.dataset.index) + 1;
       
        if (input.value && nextIndex < 6) {
          mfaInputsContainer.children[nextIndex].focus();
        }
       
        if (nextIndex === 6) {
          updateMfaCode();
        }
      }

      function handleMfaBackspace(e) {
        if (e.key === 'Backspace' && !e.target.value) {
          const prevIndex = parseInt(e.target.dataset.index) - 1;
          if (prevIndex >= 0) {
            mfaInputsContainer.children[prevIndex].focus();
            mfaInputsContainer.children[prevIndex].value = '';
          }
        }
      }

      function handleMfaPaste(e) {
        const paste = (e.clipboardData || window.clipboardData).getData('text');
        if (paste.length === 6) {
          const inputs = mfaInputsContainer.querySelectorAll('.mfa-input');
          inputs.forEach((input, index) => {
            input.value = paste[index] || '';
          });
          updateMfaCode();
          verifyCode();
        }
        e.preventDefault();
      }

      function updateMfaCode() {
        let code = '';
        const inputs = mfaInputsContainer.querySelectorAll('.mfa-input');
        inputs.forEach(input => {
          code += input.value;
        });
        mfaCodeInput.value = code;
      }

      function verifyCode() {
        updateMfaCode();
        if (mfaCodeInput.value.length === 6) {
          mfaForm.submit();
        } else {
          showMfaError('Veuillez entrer un code complet de 6 chiffres');
        }
      }

      function showMfaError(message) {
        mfaError.textContent = message;
        mfaError.style.display = 'block';
        mfaInputsContainer.classList.add('shake');
        setTimeout(() => {
          mfaInputsContainer.classList.remove('shake');
        }, 500);
      }

      function resendCode() {
        const formData = new FormData();
        formData.append('resend_otp', '1');
        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            mfaError.style.display = 'none';
            generateMfaInputs();
            alert('Un nouveau code a été envoyé à votre email.');
        })
        .catch(error => {
            showMfaError('Erreur lors du renvoi du code : ' + error);
        });
      }

      verifyBtn.addEventListener('click', verifyCode);
      resendBtn.addEventListener('click', resendCode);

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && mfaModal._isShown) {
          verifyCode();
        }
      });

      loginForm.addEventListener('submit', function(e) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="bi bi-lock-fill"></i> Connexion en cours...';
      });
    });
  </script>
</body>
</html>