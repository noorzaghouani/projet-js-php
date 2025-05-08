import { StyleSheet } from 'react-native';

export default StyleSheet.create({
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
    'maxWidth': [{ 'unit': 'px', 'value': 600 }],
    'margin': [{ 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }],
    'background': '#fff',
    'padding': [{ 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 30 }],
    'marginTop': [{ 'unit': 'px', 'value': 50 }],
    'borderRadius': '12px',
    'boxShadow': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'string', 'value': 'rgba(0,0,0,0.1)' }]
  },
  'form label': {
    'fontWeight': 'bold',
    'display': 'block',
    'marginTop': [{ 'unit': 'px', 'value': 15 }]
  },
  'form input': {
    'width': [{ 'unit': '%H', 'value': 1 }],
    'padding': [{ 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 10 }],
    'marginTop': [{ 'unit': 'px', 'value': 5 }],
    'borderRadius': '8px',
    'border': [{ 'unit': 'px', 'value': 1 }, { 'unit': 'string', 'value': 'solid' }, { 'unit': 'string', 'value': '#ccc' }]
  },
  'form textarea': {
    'width': [{ 'unit': '%H', 'value': 1 }],
    'padding': [{ 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 10 }],
    'marginTop': [{ 'unit': 'px', 'value': 5 }],
    'borderRadius': '8px',
    'border': [{ 'unit': 'px', 'value': 1 }, { 'unit': 'string', 'value': 'solid' }, { 'unit': 'string', 'value': '#ccc' }]
  },
  'form button': {
    'backgroundColor': '#3498db',
    'color': 'white',
    'border': [{ 'unit': 'string', 'value': 'none' }],
    'padding': [{ 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 20 }],
    'marginTop': [{ 'unit': 'px', 'value': 20 }],
    'borderRadius': '8px',
    'cursor': 'pointer'
  },
  'form button:hover': {
    'backgroundColor': '#2980b9'
  }
});
