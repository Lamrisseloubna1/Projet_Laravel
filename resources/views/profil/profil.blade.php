<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <!-- Ajoutez les liens vers React et ReactDOM ici -->
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
</head>
<body>
    <div id="app"></div>

    <script>
        // ProfileWindow.js
        const ProfileWindow = ({ user }) => {
          return React.createElement('div', { className: 'profile-window' },
            React.createElement('img', { src: user.avatar, alt: 'User Avatar', className: 'avatar' }),
            React.createElement('div', { className: 'user-info' },
              React.createElement('h2', null, user.name),
              React.createElement('p', null, user.email)
              // Ajoutez d'autres informations de profil si nécessaire
            )
          );
        };

        // Utilisez le composant dans votre application
        const currentUser = {
          name: 'John Doe',
          email: 'john@example.com',
          avatar: 'https://example.com/avatar.jpg', // URL de l'image d'avatar
          // Ajoutez d'autres informations de profil si nécessaire
        };

        ReactDOM.render(
          React.createElement(ProfileWindow, { user: currentUser }),
          document.getElementById('app')
        );
    </script>

    <style>
        /* Ajoutez les styles ici */
        .profile-window {
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          padding: 20px;
          border: 1px solid #ccc;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .avatar {
          width: 100px;
          height: 100px;
          border-radius: 50%;
          margin-bottom: 20px;
        }

        .user-info {
          text-align: center;
        }

        h2 {
          margin-bottom: 5px;
        }

        p {
          color: #666;
        }
    </style>
</body>
</html>
