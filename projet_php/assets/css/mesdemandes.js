import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  'body::before': {
    'content': '""',
    'position': 'fixed',
    'top': [{ 'unit': 'px', 'value': 0 }],
    'left': [{ 'unit': 'px', 'value': 0 }],
    'width': [{ 'unit': '%H', 'value': 1 }],
    'height': [{ 'unit': '%V', 'value': 1 }],
    'backgroundColor': 'rgba(0,0,0,0.5)',
    // transparence noire
    'zIndex': '-1'
  },
  'container': {
    'maxWidth': [{ 'unit': 'px', 'value': 1000 }],
    'margin': [{ 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }, { 'unit': 'string', 'value': 'auto' }],
    'backgroundColor': '#ffffff',
    'padding': [{ 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 30 }],
    'borderRadius': '15px',
    'boxShadow': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'string', 'value': 'rgba(0, 0, 0, 0.1)' }]
  },
  'h2': {
    'marginBottom': [{ 'unit': 'px', 'value': 25 }],
    'fontWeight': '600',
    'color': '#343a40'
  },
  'table': {
    'borderRadius': '10px',
    'overflow': 'hidden',
    'boxShadow': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 2 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'string', 'value': 'rgba(0, 0, 0, 0.05)' }]
  },
  'table thead': {
    'backgroundColor': '#212529',
    'color': '#ffffff'
  },
  'table tbody tr:nth-child(odd)': {
    'backgroundColor': '#f2f2f2'
  },
  'table td': {
    'verticalAlign': 'middle',
    'textAlign': 'center'
  },
  'table th': {
    'verticalAlign': 'middle',
    'textAlign': 'center'
  },
  'badge-attente': {
    'backgroundColor': '#ffc107',
    'color': '#212529',
    'fontSize': [{ 'unit': 'rem', 'value': 0.9 }],
    'padding': [{ 'unit': 'px', 'value': 6 }, { 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 6 }, { 'unit': 'px', 'value': 12 }],
    'borderRadius': '10px'
  },
  'badge-accepter': {
    'backgroundColor': '#28a745',
    'fontSize': [{ 'unit': 'rem', 'value': 0.9 }],
    'padding': [{ 'unit': 'px', 'value': 6 }, { 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 6 }, { 'unit': 'px', 'value': 12 }],
    'borderRadius': '10px'
  },
  'badge-refuser': {
    'backgroundColor': '#dc3545',
    'fontSize': [{ 'unit': 'rem', 'value': 0.9 }],
    'padding': [{ 'unit': 'px', 'value': 6 }, { 'unit': 'px', 'value': 12 }, { 'unit': 'px', 'value': 6 }, { 'unit': 'px', 'value': 12 }],
    'borderRadius': '10px'
  }
});
