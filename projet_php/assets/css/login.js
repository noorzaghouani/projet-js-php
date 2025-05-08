import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  'body': {
    'height': [{ 'unit': '%V', 'value': 1 }],
    'fontFamily': 'Arial, sans-serif'
  },
  'html': {
    'height': [{ 'unit': '%V', 'value': 1 }],
    'fontFamily': 'Arial, sans-serif'
  },
  'bg-image': {
    'background': 'url('../images/background.jpg') no-repeat center center fixed',
    'backgroundSize': 'cover'
  },
  'login-container': {
    'maxWidth': [{ 'unit': 'px', 'value': 400 }],
    'width': [{ 'unit': '%H', 'value': 1 }]
  },
  'input::placeholder': {
    'color': '#888'
  }
});
