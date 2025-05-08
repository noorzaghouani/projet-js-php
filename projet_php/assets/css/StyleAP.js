import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  // styleP.css - Style complet avec image de fond
  // Base styles
  'body': {
    'fontFamily': ''Segoe UI', Tahoma, Geneva, Verdana, sans-serif',
    'margin': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }],
    'padding': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }],
    'color': '#333',
    'lineHeight': [{ 'unit': 'px', 'value': 1.6 }],
    'minHeight': [{ 'unit': 'vh', 'value': 100 }],
    // Image de fond avec overlay
    'background': 'linear-gradient(rgba(40, 62, 80, 0.85), rgba(40, 62, 80, 0.85)),
        url('../images/background.jpg') no-repeat center center fixed',
    'backgroundSize': 'cover'
  },
  'container': {
    'maxWidth': [{ 'unit': 'px', 'value': 800 }],
    'margin': [{ 'unit': 'px', 'value': 40 }, { 'unit': 'string', 'value': 'auto' }, { 'unit': 'px', 'value': 40 }, { 'unit': 'string', 'value': 'auto' }],
    'padding': [{ 'unit': 'px', 'value': 40 }, { 'unit': 'px', 'value': 40 }, { 'unit': 'px', 'value': 40 }, { 'unit': 'px', 'value': 40 }],
    'background': 'rgba(168, 157, 157, 0.329)',
    'borderRadius': '15px',
    'boxShadow': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'string', 'value': 'rgba(0, 0, 0, 0.15)' }],
    'backdropFilter': 'blur(3px)',
    '<w768': {
      'margin': [{ 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 20 }],
      'padding': [{ 'unit': 'px', 'value': 25 }, { 'unit': 'px', 'value': 25 }, { 'unit': 'px', 'value': 25 }, { 'unit': 'px', 'value': 25 }]
    },
    '<w480': {
      'padding': [{ 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 20 }]
    }
  },
  'h1': {
    'color': '#2c3e50',
    'textAlign': 'center',
    'marginBottom': [{ 'unit': 'px', 'value': 30 }],
    'fontWeight': '700',
    'fontSize': [{ 'unit': 'rem', 'value': 2.2 }],
    'position': 'relative',
    'paddingBottom': [{ 'unit': 'px', 'value': 15 }]
  },
  'h1::after': {
    'content': '''',
    'position': 'absolute',
    'bottom': [{ 'unit': 'px', 'value': 0 }],
    'left': [{ 'unit': '%H', 'value': 0.5 }],
    'transform': 'translateX(-50%)',
    'width': [{ 'unit': 'px', 'value': 100 }],
    'height': [{ 'unit': 'px', 'value': 4 }],
    'background': 'linear-gradient(90deg, #3498db, #9b59b6)',
    'borderRadius': '2px'
  },
  'h1 i': {
    'marginRight': [{ 'unit': 'px', 'value': 15 }],
    'color': '#3498db'
  },
  // Message d'erreur
  'message-erreur': {
    'backgroundColor': '#ffecec',
    'color': '#e74c3c',
    'padding': [{ 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }],
    'borderRadius': '8px',
    'marginBottom': [{ 'unit': 'px', 'value': 25 }],
    'borderLeft': [{ 'unit': 'px', 'value': 4 }, { 'unit': 'string', 'value': 'solid' }, { 'unit': 'string', 'value': '#e74c3c' }],
    'fontWeight': '500',
    'display': 'flex',
    'alignItems': 'center',
    'gap': '10px'
  },
  // Formulaire
  'form-ajout': {
    'display': 'flex',
    'flexDirection': 'column',
    'gap': '25px'
  },
  'form-group': {
    'display': 'flex',
    'flexDirection': 'column',
    'gap': '8px'
  },
  'form-group label': {
    'fontWeight': '600',
    'color': '#2c3e50',
    'display': 'flex',
    'alignItems': 'center',
    'gap': '8px'
  },
  'form-group label i': {
    'width': [{ 'unit': 'px', 'value': 20 }],
    'color': '#3498db'
  },
  'form-ajout input': {
    'padding': [{ 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }],
    'border': [{ 'unit': 'px', 'value': 2 }, { 'unit': 'string', 'value': 'solid' }, { 'unit': 'string', 'value': '#e0e6ed' }],
    'borderRadius': '8px',
    'fontSize': [{ 'unit': 'px', 'value': 16 }],
    'transition': 'all 0.3s ease',
    'width': [{ 'unit': '%H', 'value': 1 }],
    'boxSizing': 'border-box',
    'backgroundColor': 'rgba(255, 255, 255, 0.8)'
  },
  'form-ajout textarea': {
    'padding': [{ 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }],
    'border': [{ 'unit': 'px', 'value': 2 }, { 'unit': 'string', 'value': 'solid' }, { 'unit': 'string', 'value': '#e0e6ed' }],
    'borderRadius': '8px',
    'fontSize': [{ 'unit': 'px', 'value': 16 }],
    'transition': 'all 0.3s ease',
    'width': [{ 'unit': '%H', 'value': 1 }],
    'boxSizing': 'border-box',
    'backgroundColor': 'rgba(255, 255, 255, 0.8)'
  },
  'form-ajout input:focus': {
    'borderColor': '#3498db',
    'outline': 'none',
    'boxShadow': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 3 }, { 'unit': 'string', 'value': 'rgba(52, 152, 219, 0.2)' }]
  },
  'form-ajout textarea:focus': {
    'borderColor': '#3498db',
    'outline': 'none',
    'boxShadow': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 3 }, { 'unit': 'string', 'value': 'rgba(52, 152, 219, 0.2)' }]
  },
  'form-ajout textarea': {
    'minHeight': [{ 'unit': 'px', 'value': 150 }],
    'resize': 'vertical'
  },
  // Boutons
  'form-actions': {
    'display': 'flex',
    'justifyContent': 'space-between',
    'gap': '15px',
    'marginTop': [{ 'unit': 'px', 'value': 20 }]
  },
  'form-actions button': {
    'background': 'linear-gradient(135deg, #3498db, #2980b9)',
    'color': 'white',
    'border': [{ 'unit': 'string', 'value': 'none' }],
    'padding': [{ 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 30 }],
    'borderRadius': '8px',
    'cursor': 'pointer',
    'fontSize': [{ 'unit': 'px', 'value': 16 }],
    'fontWeight': '600',
    'transition': 'all 0.3s ease',
    'flex': '1',
    'textTransform': 'uppercase',
    'letterSpacing': [{ 'unit': 'px', 'value': 1 }]
  },
  'form-actions button:hover': {
    'background': 'linear-gradient(135deg, #2980b9, #3498db)',
    'transform': 'translateY(-2px)',
    'boxShadow': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 5 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'string', 'value': 'rgba(41, 128, 185, 0.3)' }]
  },
  'btn-retour': {
    'background': '#f8f9fa',
    'color': '#2c3e50',
    'border': [{ 'unit': 'px', 'value': 2 }, { 'unit': 'string', 'value': 'solid' }, { 'unit': 'string', 'value': '#e0e6ed' }],
    'padding': [{ 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 30 }],
    'borderRadius': '8px',
    'textDecoration': 'none',
    'textAlign': 'center',
    'fontSize': [{ 'unit': 'px', 'value': 16 }],
    'fontWeight': '600',
    'transition': 'all 0.3s ease',
    'flex': '1',
    'display': 'flex',
    'alignItems': 'center',
    'justifyContent': 'center'
  },
  'btn-retour:hover': {
    'background': '#e9ecef',
    'borderColor': '#d0d7e0',
    'transform': 'translateY(-2px)'
  },
  // Animations
  'form-ajout input': {
    'animation': 'fadeIn 0.5s ease forwards'
  },
  'form-ajout textarea': {
    'animation': 'fadeIn 0.5s ease forwards'
  },
  'form-actions button': {
    'animation': 'fadeIn 0.5s ease forwards'
  },
  'btn-retour': {
    'animation': 'fadeIn 0.5s ease forwards'
  },
  'form-group:nth-child(1)': {
    'animationDelay': '0.1s'
  },
  'form-group:nth-child(2)': {
    'animationDelay': '0.2s'
  },
  'form-group:nth-child(3)': {
    'animationDelay': '0.3s'
  },
  'form-group:nth-child(4)': {
    'animationDelay': '0.4s'
  },
  'form-actions': {
    'animationDelay': '0.5s'
  },
  // Responsive
});
