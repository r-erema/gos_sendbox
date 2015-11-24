/**
 * @var {Object} Spawn
 */
Spawn.prototype.createWorker = function () {
    return this.createCreep([WORK, CARRY, MOVE], null, {role: 'worker'});
}
