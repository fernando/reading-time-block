wp.blocks.registerBlockType('reading-time-block/reading-time', {
  title: 'Reading Time',
  icon: 'clock',
  category: 'common',

  edit: function(props) {
    return wp.element.createElement(
      'div',
      { className: props.className },
      'Reading Time'
    );
  },

  save: function(props) {
    return null;
  }
});
