import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  'body': {
    'margin': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 0 }],
    'fontFamily': ''Segoe UI', sans-serif',
    'backgroundColor': '#f4f4f4'
  },
  'sidebar': {
    'width': [{ 'unit': 'px', 'value': 220 }],
    'backgroundColor': '#2c3e50',
    'minHeight': [{ 'unit': 'vh', 'value': 100 }]
  },
  'sidebar a': {
    'color': 'white',
    'textDecoration': 'none',
    'padding': [{ 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 10 }, { 'unit': 'px', 'value': 10 }],
    'display': 'block'
  },
  'sidebar a:hover': {
    'backgroundColor': '#1abc9c'
  },
  'content': {
    'backgroundColor': '#fff',
    'flexGrow': '1'
  },
  'stat-box': {
    'borderRadius': '10px'
  }
});
