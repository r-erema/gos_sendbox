import React from 'react';
import {GridList, GridTile} from 'material-ui/GridList';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import IconButton from 'material-ui/IconButton';
import StarBorder from 'material-ui/svg-icons/toggle/star-border';

class ArticlesGrid extends React.Component {

    constructor() {
        super();
        this.styleList = {
            width: 500,
            height: 450,
            overflowY: 'auto',
          }
    }

    handleClick(e) {
        console.log(e);
    };

    render() {
        return (
            <MuiThemeProvider>
                <GridList cols={2} cellHeight={200} padding={1} style={this.styleList} >
                 {
                     this.props.articles.map(function (article) {
                         return (
                                <GridTile
                                    title={article.title}
                                    key={article.id}
                                    actionIcon={<IconButton href={`#${article.id}`} onClick={this.handleClick} ><StarBorder color="white" /></IconButton>}
                                    actionPosition="left"
                                >
                                    <img src={`img/${article.img}`} alt={article.title} />
                                </GridTile>
                         )
                     }, this)
                 }
                </GridList>
            </MuiThemeProvider>
        );
    }

}

export default ArticlesGrid;