/*import React from 'react';
import { RichTextField } from 'admin-on-rest';
//import RichTextInput from 'aor-rich-text-input';
import { HydraAdmin } from '@api-platform/admin';
import parseHydraDocumentation from '@api-platform/api-doc-parser/lib/hydra/parseHydraDocumentation';

const entrypoint = 'http://127.0.0.1/book_shop/public/api';

const myApiDocumentationParser = entrypoint => parseHydraDocumentation(entrypoint)
  .then( ({ api }) => {
    const book = api.resources.find(({ name }) => 'book' === name);
    const description = book.fields.find(f => 'description' === f.name);

    /*description.input = props => (
      <RichTextInput {...props} source="description" />
    );

    description.input.defaultProps = {
      addField: true,
      addLabel: true
    };*/
    
  /*  return { api };
  })
;
export default (props) => <HydraAdmin apiDocumentationParser={myApiDocumentationParser} entrypoint={entrypoint}/>;
*/
import React, { Component } from 'react';
import { HydraAdmin } from '@api-platform/admin';

class App extends Component {
    render() {
        return <HydraAdmin entrypoint="http://localhost:8000/api"/> // Replace with your own API entrypoint
    }
}

export default App;