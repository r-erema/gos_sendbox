import React from 'react';
import {GridList, GridTile} from 'material-ui/GridList';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import IconButton from 'material-ui/IconButton';
import StarBorder from 'material-ui/svg-icons/toggle/star-border';
import {browserHistory} from 'react-router';


class ArticlesGrid extends React.Component {

    constructor(props, context) {
        super(props, context);
        this.styleList = {
            width: 500,
            height: 450,
            overflowY: 'auto',
        };
        context.router
    }

    handleClick(artId) {
        browserHistory.push(`/message/${artId}`);
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
                                    actionIcon={<IconButton href={`message/#${article.id}`} onClick={this.handleClick.bind(this, article.id)} ><StarBorder color="white" /></IconButton>}
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

ArticlesGrid.contextTypes = {
    router: React.PropTypes.object.isRequired
};

export default ArticlesGrid;