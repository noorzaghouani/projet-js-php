import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  'body': {
    'fontFamily': 'Arial, sans-serif',
    'backgroundColor': '#f7f7f7',
    'margin': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }],
    'padding': [{ 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 20 }]
  },
  'container': {
    'maxWidth': [{ 'unit': 'px', 'value': 1000 }],
    'margin': [{ 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }],
    'background': 'white',
    'padding': [{ 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 30 }],
    'borderRadius': '10px',
    'boxShadow': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 2 }, { 'unit': 'px', 'value': 8 }, { 'unit': 'string', 'value': 'rgba(0,0,0,0.1)' }]
  },
  'h1': {
    'textAlign': 'center',
    'marginBottom': [{ 'unit': 'px', 'value': 30 }]
  },
  'btn-ajout': {
    'display': 'inline-block',
    'marginBottom': [{ 'unit': 'px', 'value': 20 }],
    'backgroundColor': '#3498db',
    'color': 'white',
    'padding': [{ 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 20 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 20 }],
    'borderRadius': '6px',
    'textDecoration': 'none'
  },
  'btn-ajout:hover': {
    'backgroundColor': '#2980b9'
  },
  'table': {
    'width': [{ 'unit': '%H', 'value': 1 }],
    'borderCollapse': 'collapse'
  },
  'table th': {
    'border': [{ 'unit': 'px', 'value': 1 }, { 'unit': 'string', 'value': 'solid' }, { 'unit': 'string', 'value': '#ddd' }],
    'padding': [{ 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 12 }],
    'textAlign': 'center'
  },
  'table td': {
    'border': [{ 'unit': 'px', 'value': 1 }, { 'unit': 'string', 'value': 'solid' }, { 'unit': 'string', 'value': '#ddd' }],
    'padding': [{ 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 12 }],
    'textAlign': 'center'
  },
  'table th': {
    'backgroundColor': '#2c3e50',
    'color': 'white'
  },
  'table td i': {
    'color': '#2c3e50',
    'margin': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 5 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 5 }],
    'cursor': 'pointer'
  },
  'table td i:hover': {
    'color': '#e74c3c'
  }
});
