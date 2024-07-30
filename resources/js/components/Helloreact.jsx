import React from 'react';
import ReactDOM from 'react-dom/client';

import { BrowserRouter} from 'react-router-dom' ;

export default function myapp(){
 return(
  
  <div><h1>Hellow</h1></div>
  
 
  );

}
const ro=document.getElementById("app");
const root=ReactDOM.createRoot(ro);
root.render(<myapp/>);


