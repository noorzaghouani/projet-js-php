import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  'bg-image': {
    'backgroundImage': 'url('../images/background.jpg')no-repeat center center fixed',
    'backgroundSize': 'cover',
    'backgroundPosition': 'center',
    'height': [{ 'unit': 'vh', 'value': 100 }]
  },
  'login-container': {
    'maxWidth': [{ 'unit': 'px', 'value': 450 }]
  },
  'btn-success': {
    'backgroundColor': '#2457e2',
    'borderColor': '#286aa7',
    'color': 'white'
  },
  'btn-success:hover': {
    'backgroundColor': '#3e508d',
    'borderColor': '#1e537e'
  }
});
