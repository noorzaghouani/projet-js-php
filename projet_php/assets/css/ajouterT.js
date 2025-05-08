import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  'body': {
    'height': [{ 'unit': '%V', 'value': 1 }],
    'margin': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }],
    'fontFamily': ''Segoe UI', Tahoma, Geneva, Verdana, sans-serif'
  },
  'html': {
    'height': [{ 'unit': '%V', 'value': 1 }],
    'margin': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }],
    'fontFamily': ''Segoe UI', Tahoma, Geneva, Verdana, sans-serif'
  },
  'overlay': {
    'position': 'fixed',
    'top': [{ 'unit': 'px', 'value': 0 }],
    'left': [{ 'unit': 'px', 'value': 0 }],
    'width': [{ 'unit': '%H', 'value': 1 }],
    'height': [{ 'unit': '%V', 'value': 1 }],
    'background': 'url('../images/background.jpg') no-repeat center center/cover',
    'zIndex': '-1',
    'filter': 'blur(3px)'
  },
  'form-container': {
    'maxWidth': [{ 'unit': 'px', 'value': 700 }],
    'margin': [{ 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }],
    'backgroundColor': 'rgba(168, 157, 157, 0.329)'
  }
});
